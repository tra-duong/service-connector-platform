<?php

namespace Modules\SocialAuth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\SocialAuth\Database\Factories\SocialProviderFactory;
use Modules\User\Models\User;

class SocialProvider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'machine_name',
    ];

    protected static function newFactory(): SocialProviderFactory
    {
        return SocialProviderFactory::new();
    }

    /**
     * Get users using social.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUser(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
