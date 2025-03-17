<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => env('IGDB_CLIENT_ID'),
            'client_secret' => env('IGDB_CLIENT_SECRET'),
            'grant_type' => 'client_credentials',
        ]);

        $accessToken = $response->json()['access_token'];

        $popularGames = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => 'Bearer ' . $accessToken,
        ])
        ->withBody(
            'fields *, cover.*;
            where rating != null;
            sort rating desc;
            limit 12;',
            'text/plain'
        )
        ->post('https://api.igdb.com/v4/games')
        ->json();

        dd($popularGames);

        return view('index', [
            'popularGames' => $popularGames,
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
    public function show(string $id)
    {
        //
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
