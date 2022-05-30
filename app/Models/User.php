<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'games_won',
        'total_points',
        'matches_won',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_users')->withPivot('score');
    }

    public function getGamesWonAttribute()
    {
        return Game::query()
            ->whereHas('users', fn($query) => $query->where('users.id', $this->id))
            ->get()
            ->filter(function($game) {
                return $game->users()->withPivot('score')->orderByPivot('score', 'desc')->first()->id === $this->id;
            })
            ->count();
    }

    public function getTotalPointsAttribute()
    {
        return $this->games()->withPivot('score')->sum('score');
    }

    public function getMatchesWonAttribute()
    {
        return Game::query()
                ->whereHas('users', fn($query) => $query->where('users.id', $this->id))
                ->with('match')
                ->get()
                ->filter(function($game) {
                    return $game->users()->withPivot('score')->orderByPivot('score', 'desc')->first()->id === $this->id;
                })
                ->groupBy('match_id')
                ->filter(function($matchGames) {
                    return $matchGames->count() >= $matchGames->first()->match->games_required_to_win_match;
                })
                ->count();
    }
}
