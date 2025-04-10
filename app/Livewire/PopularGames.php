<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

        $this->popularGames = Cache::remember('popular-games', 7, function () use ($before, $after) {
            // Step 1: Get the access token
            // $response = Http::post('https://id.twitch.tv/oauth2/token', [
            //     'client_id' => env('IGDB_CLIENT_ID'),
            //     'client_secret' => env('IGDB_CLIENT_SECRET'),
            //     'grant_type' => 'client_credentials',
            // ]);

            // Step 2: Use the access token to fetch popular games
            return Http::withHeaders(config('services.igdb'))
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
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
