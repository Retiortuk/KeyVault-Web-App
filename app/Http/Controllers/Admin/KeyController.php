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
        $gamesWithKeys = Game::whereHas('keys', function($query) {
            $query->where('is_used', false);
        })
        ->withCount([
            'keys as total_keys' => function ($query) {
                $query->where('is_used', false);
            },
            'keys as available_keys' => function ($query) {
                $query->where('is_used', false);
            }
        ])
        ->with(['keys' => function ($query) {
            $query->where('is_used', false)->latest();
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
            $insertedCount = 0;
            foreach (array_chunk($insertData, 500) as $chunk) {
                $insertedCount += GameKey::insertOrIgnore($chunk);
            }

            if ($insertedCount === 0) {
                return redirect()
                    ->back()
                    ->with('error', 'Gagal menambahkan! Semua License Key tersebut sudah ada di database.');
            }
            elseif ($insertedCount < count($insertData)) {
                $duplicateCount = count($insertData) - $insertedCount;
                return redirect()
                    ->route('admin.keys.index')
                    ->with('success', "{$insertedCount} Key berhasil ditambahkan. ({$duplicateCount} Key diabaikan karena duplikat).");
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
