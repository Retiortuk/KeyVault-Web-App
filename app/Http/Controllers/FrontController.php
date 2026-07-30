<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public function index()
    {
        $games = Game::withCount(['keys as stock' => function ($query) {
            $query->where('is_used', false);
        }])->latest()->paginate(8);

        return view('welcome', compact('games'));
    }

    public function show($id)
    {
        $game = Game::withCount(['keys as stock' => function ($query) {
            $query->where('is_used', false);
        }])->findOrFail($id);

        return view('front.game', compact('game'));
    }

    public function checkout($id)
    {
        $game = Game::withCount(['keys as stock' => function ($query) {
            $query->where('is_used', false);
        }])->findOrFail($id);

        if($game->stock < 1) {
            return redirect()
                ->route('game.show', $id)
                ->wih('error', 'Sorry, this game is currently out of stock.');
        }

        return view('front.checkout', compact('game'));
    }
}
