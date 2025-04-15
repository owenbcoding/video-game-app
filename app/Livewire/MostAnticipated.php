<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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

        $this->mostAnticipated = Cache::remember('most-anticipated', 7, function () use ($before, $afterFourMonths) {

            $response = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id' => config('services.igdb.client_id'),
                'client_secret' => config('services.igdb.client_secret'),
                'grant_type' => 'client_credentials',
            ]);
            
            $accessToken = $response->json()['access_token'];

            return Http::withHeaders([ 
                'Client-ID' => config('services.igdb.client_id'),
                'Authorization' => 'Bearer ' . $accessToken,
            ])->withBody(
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
        });
        
    }


    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
