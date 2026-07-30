<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'order_code',
        'game_id',
        'game_key_id',
        'customer_name',
        'customer_email',
        'amount',
        'status',
        'snap_token',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function gameKey()
    {
        return $this->belongsTo(GameKey::class);
    }
}
