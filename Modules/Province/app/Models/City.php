<?php

namespace Modules\Province\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'machine_name',
        'region',
        'type',
        'phone_code',
    ];

    /**
     * Get city Districts.
     */
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    /**
     * get City Wards.
     */
    public function wards(): HasManyThrough
    {
        return $this->hasManyThrough(Ward::class, District::class);
    }
}
