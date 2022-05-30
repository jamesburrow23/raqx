<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'game_users')->withPivot('score');
    }

    public function match()
    {
        return $this->belongsTo(MatchModel::class);
    }
}
