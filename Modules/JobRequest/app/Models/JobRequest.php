<?php

namespace Modules\JobRequest\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\JobRequest\Database\Factories\JobRequestFactory;
use Modules\Province\Models\City;
use Modules\Province\Models\District;
use Modules\Province\Models\Ward;
use Modules\Team\Models\Team;
use Modules\User\Models\User;

class JobRequest extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        // Raw request text
        'raw_request',
        /**
         * Location:
         *  Country default VietNam
         *  City    default HCMC
         *  District
         *  Ward
         *  Street
         *  Address
         *  Lat
         *  Long
         *  Accuracy
         */
        'country',
        'city_id',
        'district_id',
        'ward_id',
        'street_id',
        'home_number',
        'lat',
        'long',
        'accuracy',
        'author',
        // Files for the request.
        'files',
        'schedule_time',
        'start_time',
        'approx_duration',
        'expired_time',
        // Numbers of member needed.
        'quantity',
        // Person who get request.
        'assign_to_user',
        // Team who get the request.
        'assign_to_team',
        // Type individual or team.
        'type',
        'assign_time',
        'cancel_time',
        'completed_time',
        'note',
        'status',
    ];

    protected static function newFactory(): JobRequestFactory
    {
        return JobRequestFactory::new();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'files' => 'array',
        ];
    }

    protected function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    protected function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    protected function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }

    protected function assignUser(): HasOne
    {
        return $this->hasOne(User::class, 'assign_to_user');
    }

    protected function assignTeam(): HasOne
    {
        return $this->hasOne(Team::class, 'assign_to_team');
    }
}
