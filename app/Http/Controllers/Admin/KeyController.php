<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameKey;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index()
    {
        $gamesWithKeys = Game::whereHas('keys')
            ->withCount([
                'keys as total_keys',
                'keys as available_keys' => function ($query) {
                    $query->where('is_used', false);
                }
            ])
            ->with(['keys' => function ($query) {
                $query->latest();
            }])
            ->latest()
            ->paginate(10);

        $allGames = Game::select('id', 'title')->orderBy('title')->get();

        return view('admin.keys.index', compact('gamesWithKeys', 'allGames'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'keys' => 'required|string',
        ]);

        $keysArray = explode("\n", str_replace("\r", "", $request->keys));
        $insertData = [];
        $now = now();

        foreach ($keysArray as $key) {
            $cleanKey = trim($key);

            if (!empty($cleanKey)) {
                $insertData[] = [
                    'game_id' => $request->game_id,
                    'license_key' => $cleanKey,
                    'is_used' => false,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        if (count($insertData) > 0) {
            foreach (array_chunk($insertData, 500) as $chunk) {
                GameKey::insert($chunk);
            }

            return redirect()->route('admin.keys.index')->with('success', count($insertData) . ' License Keys successfully added!');
        }

        return redirect()->back()->with('error', 'no valid keys found.');
    }

    public function destroy(GameKey $key)
    {
        $key->delete();

        return redirect()->route('admin.keys.index')->with('success', 'License Key successfully deleted!');
    }
}
