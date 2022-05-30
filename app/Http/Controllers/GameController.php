<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index()
    {
        return Inertia::render('Games/Index', [
            'games' => Game::all(),
        ]);
    }

    public function create(Request $request)
    {
        // this is where you'll return a page that contains the create form
    }

    public function store(Request $request)
    {
        // this is where you'll process the incoming request and save it to the database
    }

    public function show(Game $game, Request $request)
    {
        // this is where you'll return a page that shows a game
    }

    public function edit(Game $game, Request $request)
    {
        // this is where you'll return a page that contains the edit form
    }

    public function update(Game $game, Request $request)
    {
        // this is where you'll update the game with the data coming in from the request
    }

    public function destroy(Game $game)
    {
        // this is where you'll delete a game
    }
}
