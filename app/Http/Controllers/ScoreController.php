<?php

namespace App\Http\Controllers;
use App\Models\Game;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function index()
{
    $games = Game::all();
    return view('games.index', compact('games'));
}
    public function create()
    {
        return view('games.create');
    }

    // Store a new game
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'team_a_name' => 'required|string|max:255',
            'team_b_name' => 'required|string|max:255',
            'match_date' => 'nullable|date',
        ]);

        // Create a new game
        Game::create([
            'team_a_name' => $request->input('team_a_name'),
            'team_b_name' => $request->input('team_b_name'),
            'match_date' => $request->input('match_date'),
        ]);

        // Redirect to the games list with a success message
        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }
    public function update(Request $request, Game $game)
    {
        // Validate the request data
        $request->validate([
            'team_a_score' => 'required|integer|min:0',
            'team_b_score' => 'required|integer|min:0',
        ]);

        // Update the scores for the match
        $match->team_a_score = $request->input('team_a_score');
        $match->team_b_score = $request->input('team_b_score');
        $match->save();

        // Redirect to the matches list with a success message
        return redirect()->route('games.index')->with('success', 'Score updated successfully.');
    }
}
