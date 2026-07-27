<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    //

    use HasFactory;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function gameKey()
    {
        return $this->belongsTo(GameKey::class);
    }
}
