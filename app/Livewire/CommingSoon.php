<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CommingSoon extends Component
{
    public $comingSoon = [];

    public function mount()
    {
        $this->loadComingSoon();
    }

    public function loadComingSoon()
    { 
        $current = Carbon::now()->timestamp;

        $this->comingSoon = Cache::remember('most-anticipated', 7, function () use ($current) {

            $response = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id' => env('IGDB_CLIENT_ID'),
                'client_secret' => env('IGDB_CLIENT_SECRET'),
                'grant_type' => 'client_credentials',
            ]);
            
            $accessToken = $response->json()['access_token'];

            return Http::withHeaders([ 
                'Client-ID' => config('services.igdb.client_id'),
                'Authorization' => 'Bearer ' . $accessToken,
            ])->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating, summary;
                where platforms = (48,49,130,6)
                & first_release_date > {$current};
                sort first_release_date asc;
                limit 4;",
                'text/plain'
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();

        });
    }

    public function render()
    {
        return view('livewire.comming-soon');
    }
}
