<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{

    public $recentlyReviewed = [];

    public function mount()
    {
        $this->loadrecentlyReviewed();
    }

    public function loadrecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;
        
        $this->recentlyReviewed = Cache::remember('recently-reviewed', 7, function () use ($before, $current) {

            $response = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id' => env('IGDB_CLIENT_ID'),
                'client_secret' => env('IGDB_CLIENT_SECRET'),
                'grant_type' => 'client_credentials',
            ]);
            
            $accessToken = $response->json()['access_token'];
           
            return Http::withHeaders([ 
                'Client-ID' => config('services.igdb.client_id'),
                'Authorization' => 'Bearer ' . $accessToken,
            ])
            ->withBody(
                    "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
                    where platforms = (48,49,130,6)
                    & first_release_date > {$before}
                    & first_release_date < {$current}
                    & rating_count > 5;
                    sort popularity desc;
                    limit 3;",
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
