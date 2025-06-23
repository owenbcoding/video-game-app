<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use illuminate\Support\Str;

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
                "fields name, slug, cover.url, first_release_date, platforms.abbreviation, rating, aggregated_rating, summary, genres.name, involved_companies.company.name, screenshots.url, storyline, videos.video_id, similar_games.name, similar_games.cover.url, similar_games.rating, similar_games.platforms.abbreviation;
            where slug = \"{$slug}\";",
                'text/plain'
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();

        // dd($game);

        // abort_if(!$game, 404);

        return view('show', [
            'game' => $this->formatGameForView($game[0]),
            'screenshots' => array_slice($game[0]['screenshots'] ?? [], 0, 6),
            'videos' => $game[0]['videos'] ?? [],
            'similarGames' => array_slice($game[0]['similar_games'] ?? [], 0, 6),
        ]);
    }

    private function formatGameForView($game)
    {
        $temp = collect($game)->merge([
            'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
            'genres' => collect($game['genres'])->pluck('name')->implode(', '),
            'involvedCompanies' => $game['involved_companies.0.company.name'] ?? null,
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            'memberRating' => array_key_exists('rating', $game) ? round($game['rating']) . '%' : '0%',
            'criticRating' => array_key_exists('aggregated_rating', $game) ? round($game['aggregated_rating']) . '%' : '0%',
            'trailer' => 'https://www.youtube.com/watch/' . $game['videos'][0]['video_id'],
            'screenshots' => isset($game['screenshots']) && is_array($game['screenshots'])
                ? collect($game['screenshots'])->map(function ($screenshot) {
                    return [
                        'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                        'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                    ];
                })->take(6)->values()->toArray()
                : [],
            'similarGames' => collect($game['similar_games'])->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => array_key_exists('cover', $game) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : 'https://via.placeholder.com/264x352',
                    'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                    'platforms' => array_key_exists('platforms', $game) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : null
                ]);
            })->take(6),
            'social' => [
                'website' => (isset($game['websites']) && is_array($game['websites']))
                    ? (collect($game['websites'])->first()['url'] ?? null)
                    : null,
                'facebook' => (isset($game['websites']) && is_array($game['websites']))
                    ? optional(collect($game['websites'])->first(function ($website) {
                        return Str::contains($website['url'], 'facebook');
                    }))['url'] ?? null
                    : null,
                'twitter' => (isset($game['websites']) && is_array($game['websites']))
                    ? optional(collect($game['websites'])->first(function ($website) {
                        return Str::contains($website['url'], 'twitter');
                    }))['url'] ?? null
                    : null,
                'instagram' => (isset($game['websites']) && is_array($game['websites']))
                    ? optional(collect($game['websites'])->first(function ($website) {
                        return Str::contains($website['url'], 'instagram');
                    }))['url'] ?? null
                    : null,
            ],
        ]);

        // dd($temp);

        return $temp;
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
