<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Game;
use App\Models\GameKey;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalRevenue = Transaction::where('status', 'success')->sum('amount');
        $successTransactions = Transaction::where('status', 'success')->count();
        $totalGames = Game::count();
        $availableKeys = GameKey::where('is_used', false)->count();
        // get logged in user name
        $user = Auth::user()->name;

        $recentTransactions = Transaction::with(['game', 'gameKey'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'successTransactions',
            'totalGames',
            'availableKeys',
            'user',
            'recentTransactions'
        ));
    }
}
