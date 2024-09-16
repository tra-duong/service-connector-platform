<?php

namespace Modules\JobRequest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\JobRequest\Database\Factories\JobRequestFactory;

class JobRequest extends Model
{
    use HasFactory;

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
        'city',
        'district',
        'ward',
        'street',
        'home_number',
        'lat',
        'long',
        'accuracy',
        // Files for the request.
        'files',
        'schedule_time',
        'start_time',
        'approx_duration',
        'expired_time',
        // Numbers of member needed.
        'quantity',
        // Person who get request
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


}
