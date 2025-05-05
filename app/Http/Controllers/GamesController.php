<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $before = Carbon::now()->subMonths(2)->timestamp;
        // $after = Carbon::now()->addMonths(2)->timestamp;
        // $current = Carbon::now()->timestamp;
        // $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        // $response = Http::post('https://id.twitch.tv/oauth2/token', [
        //     'client_id' => env('IGDB_CLIENT_ID'),
        //     'client_secret' => env('IGDB_CLIENT_SECRET'),
        //     'grant_type' => 'client_credentials',
        // ]);

        // $accessToken = $response->json()['access_token'];

        // $popularGames = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => 'Bearer ' . $accessToken,
        // ])
        // ->withBody(
        //     "fields name, cover.url, first_release_date, platforms.abbreviation, rating, summary;
        //     where platforms = (48,49,130,6)
        //     & first_release_date > {$before}
        //     & first_release_date < {$after};
        //     sort rating desc;
        //     limit 11;",
        //     'text/plain'
        // )
        // ->post('https://api.igdb.com/v4/games')
        // ->json();

        // dd($popularGames);

        // $recentlyReviewed = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => 'Bearer ' . $accessToken,
        // ])
        //     ->withBody(
        //         "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
        //         where platforms = (48,49,130,6)
        //         & first_release_date > {$before}
        //         & first_release_date < {$current}
        //         & rating_count > 5;
        //         sort popularity desc;
        //         limit 3;",
        //         'text/plain'
        //     )
        //     ->post('https://api.igdb.com/v4/games')
        //     ->json();

        // dd($recentlyReviewed);

        // $mostAnticipated = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => 'Bearer ' . $accessToken,
        // ])
        //     ->withBody(
        //         "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
        //         where platforms = (48,49,130,6)
        //         & first_release_date > {$before}
        //         & first_release_date < {$afterFourMonths}
        //         & rating_count > 5;
        //         sort popularity desc;
        //         limit 3;",
        //         'text/plain'
        //     )
        //     ->post('https://api.igdb.com/v4/games')
        //     ->json();

        // dd($mostAnticipated);

        // $comingSoon = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => 'Bearer ' . $accessToken,
        // ])
        // ->withBody(
        //     "fields name, cover.url, first_release_date, platforms.abbreviation, rating, summary;
        //     where platforms = (48,49,130,6)
        //     & first_release_date > {$current};
        //     sort first_release_date asc;
        //     limit 4;",
        //     'text/plain'
        // )
        // ->post('https://api.igdb.com/v4/games')
        // ->json();

        // dd($comingSoon);

        return view('index', [
            // 'popularGames' => $popularGames,
            // 'recentlyReviewed' => $recentlyReviewed,
            // 'mostAnticipated' => $mostAnticipated,
            // 'comingSoon' => $comingSoon,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $response = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => env('IGDB_CLIENT_ID'),
            'client_secret' => env('IGDB_CLIENT_SECRET'),
            'grant_type' => 'client_credentials',
        ]);

        $accessToken = $response->json()['access_token'];

        $game = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => 'Bearer ' . $accessToken,
        ])
        ->withBody(
            "fields name, slug, cover.url, first_release_date, platforms.abbreviation, rating, aggregated_rating, summary, genres.name, involved_companies.company.name, screenshots.url, storyline, videos.video_id;
            where slug = \"{$slug}\";",
            'text/plain'
        )
        ->post('https://api.igdb.com/v4/games')
        ->json();

        // dd($game);

        // abort_if(!$game, 404);

        return view('show', [
            'game' => $game[0],
            'screenshots' => array_slice($game[0]['screenshots'] ?? [] ?? [], 0, 6),
            'videos' => $game[0]['videos'] ?? [],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
