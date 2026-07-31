<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function process(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $game = Game::withCount(['keys as stock' => function ($query) {
            $query->where('is_used', false);
        }])->findOrFail($id);

        if($game->stock < 1) {
            return redirect()
                ->route('game.show', $id)
                ->with('error', 'Sorry, this game is currently out of stock.');
        }

        $orderId = 'KVLT-' . strtoupper(Str::random(8));

        $transaction = Transaction::create([
            'order_code' => $orderId,
            'game_id' => $game->id,
            'customer_name' => $request->first_name . ' ' . $request->last_name,
            'customer_email' => $request->email,
            'amount' => $game->price,
            'status' => 'pending',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $game->price,
            ],
            'customer_details' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ],
            'item_details' => [
                [
                    'id' => $game->id,
                    'price' => (int) $game->price,
                    'quantity' => 1,
                    'name' => substr($game->title, 0, 50),
                ]
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            $transaction->update([
                'snap_token' => $snapToken,
            ]);

            return redirect()->route('checkout.payment', $orderId);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to process payment: ' . $e->getMessage());
        }
    }

    public function payment($orderId)
    {
        $transaction = Transaction::with('game')->where('order_code', $orderId)->firstOrFail();

        if($transaction->status !== 'pending') {
            return redirect()->route('checkout.failed')->with('error', 'This transaction has already been processed.');
        }

        return view('front.payment', compact('transaction'));
    }

    // Callback function to handle Midtrans notifications
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');

        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $transaction = \App\Models\Transaction::where('order_code', $request->order_id)->first();
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transactionStatus = $request->transaction_status;
        $fraudStatus = $request->fraud_status;

        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            if ($fraudStatus == 'accept' || $fraudStatus == null) {

                if ($transaction->status === 'pending') {
                    $gameKey = \App\Models\GameKey::where('game_id', $transaction->game_id)
                                                    ->where('is_used', false)
                                                    ->first();

                    if ($gameKey) {
                        $transaction->update([
                            'status'      => 'success',
                            'game_key_id' => $gameKey->id
                        ]);
                        $gameKey->update(['is_used' => true]);
                    } else {
                        $transaction->update(['status' => 'success_no_key']);
                    }
                }
            }
        } else if ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            if ($transaction->status === 'pending') {
                $transaction->update(['status' => 'failed']);
            }
        } else if ($transactionStatus == 'pending') {
            $transaction->update(['status' => 'pending']);
        }

        return response()->json(['message' => 'Callback success']);
    }

    public function success($orderCode)
    {
        $transaction = Transaction::with('gameKey')->where('order_code', $orderCode)->firstOrFail();

        return view('front.success', compact('transaction'));
    }
}
