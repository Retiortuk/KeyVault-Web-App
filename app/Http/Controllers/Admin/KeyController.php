<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameKey;
use App\Models\Game;


class KeyController extends Controller
{
    //
    public function index()
    {
        $games = Game::select('id', 'title')->latest()->get();

        $inventory = Game::withCount([
            'keys as total_keys',
            'keys as available_keys' => function ($query) {
                $query->where('is_used', false);
            }
        ])->having('total_keys', '>', 0)->get();

        return view('admin.keys.index', compact('games', 'inventory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'keys' => 'required|string',
        ]);

        $keysArray = explode("\n", str_replace("\r", "", $request->keys));
        $insertData = [];

        foreach ($keysArray as $key) {
            $cleanKey = trim($key);

            if(!empty($cleanKey)) {
                $insertData[] = [
                    'game_id' => $request->game_id,
                    'key' => $cleanKey,
                    'is_used' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if(count($insertData) > 0) {
            GameKey::insert($insertData);
        }

        return redirect()->route('admin.keys.index')->with('success', 'Keys added successfully.');
    }
}
