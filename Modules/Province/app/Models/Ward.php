<?php

namespace Modules\Province\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Ward extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'machine_name',
        'district_id',
    ];

    public function city(): HasOneThrough
    {
        return $this->hasOneThrough(City::class, District::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
