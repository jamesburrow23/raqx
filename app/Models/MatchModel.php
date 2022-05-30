<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchModel extends Model
{
    protected $table = 'matches';
    protected $guarded = [];

    public function games()
    {
        return $this->hasMany(Game::class, 'match_id');
    }

}
