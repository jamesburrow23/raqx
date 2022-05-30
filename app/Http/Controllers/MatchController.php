<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\MatchModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MatchController extends Controller
{
    public function index()
    {
        return Inertia::render('Matches/Index', [
            'matches' => MatchModel::query()->orderByDesc('id')->withCount('games')->get(),
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Matches/Create');
    }

    public function store(Request $request)
    {
        $match = MatchModel::create([
            'games_required_to_win_match' => $request->input('games_required_to_win_match'),
        ]);

        return response()->redirectToRoute('matches.show', $match);

        // this is where you'll process the incoming request and save it to the database
    }

    public function show(MatchModel $match, Request $request)
    {
        return Inertia::render('Matches/Show', [
            'match' => $match,
        ]);
    }

    public function edit(MatchModel $match, Request $request)
    {
        return Inertia::render('Matches/Edit', [
            'match' => $match,
        ]);
    }

    public function update(MatchModel $match, Request $request)
    {
        $match->update([
            'games_required_to_win_match' => $request->input('games_required_to_win_match'),
        ]);

        return response()->redirectToRoute('matches.index');
    }

    public function destroy(MatchModel $match)
    {
        // this is where you'll delete a game
    }
}
