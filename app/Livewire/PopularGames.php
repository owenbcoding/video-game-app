<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PopularGames extends Component
{

    public $popularGames = [];

    public function mount()
    {
        $this->loadPopularGames();
    }

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $response = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => env('IGDB_CLIENT_ID'),
            'client_secret' => env('IGDB_CLIENT_SECRET'),
            'grant_type' => 'client_credentials',
        ]);

        $accessToken = $response->json()['access_token'];

        $this->popularGames = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => 'Bearer ' . $accessToken,
        ])
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating, summary;
            where platforms = (48,49,130,6)
            & first_release_date > {$before}
            & first_release_date < {$after};
            sort rating desc;
            limit 11;",
                'text/plain'
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
