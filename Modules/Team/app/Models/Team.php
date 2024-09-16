<?php

namespace Modules\Team\Models;

use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Team\Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'leader',
        'parent_team',
    ];

    protected static function newFactory(): TeamFactory
    {
        return TeamFactory::new();
    }

    /**
     * Team members.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_users', 'team_id', 'user_id');
    }

    /**
     * Team leader.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function leader(): HasOne
    {
        return $this->HasOne(User::class);
    }

    /**
     * Get sub teams.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subTeams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     *  Parent team.
     */
    public function parentTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
