<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class MostAnticipated extends Component
{

    public $mostAnticipated = [];

    
    public function mount()
    {
        $this->loadMostAnticipated();
    }

    public function loadMostAnticipated()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        // $response = Http::post('https://id.twitch.tv/oauth2/token', [
        //     'client_id' => env('IGDB_CLIENT_ID'),
        //     'client_secret' => env('IGDB_CLIENT_SECRET'),
        //     'grant_type' => 'client_credentials',
        // ]);

        // $accessToken = $response->json()['access_token'];

        // $this->mostAnticipated = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => 'Bearer ' . $accessToken,
        // ])
        $this->mostAnticipated = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
                where platforms = (48,49,130,6)
                & first_release_date > {$before}
                & first_release_date < {$afterFourMonths}
                & rating_count > 5;
                sort popularity desc;
                limit 3;",
                'text/plain'
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }


    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
