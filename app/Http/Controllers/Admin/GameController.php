<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    //To Get Availaible Keys total
    public function index()
    {
        $games = Game::withCount(['keys as stock' => function ($query) {
            $query->where('is_used', false);
        }])->latest()->paginate(10);

        return view('admin.games.index', compact('games'));
    }

    //To Store New Game
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('image');

        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('games', 'public');
        }

        Game::create($data);

        return redirect()->route('admin.games.index')->with('success', 'Game created successfully.');
    }

    //To Update Game
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('image');

        if($request->hasFile('image')) {
            if($game->image) {
                Storage::disk('public')->delete($game->image);
            }
            $data['image'] = $request->file('image')->store('games', 'public');
        }

        $game->update($data);

        return redirect()->route('admin.games.index')->with('success', 'Game updated successfully.');
    }

    //To Delete Game
    public function destroy(Game $game)
    {
        if($game->image) {
            Storage::disk('public')->delete($game->image);
        }

        $game->delete();

        return redirect()->route('admin.games.index')->with('success', 'Game deleted successfully.');
    }

}
