<?php

namespace Modules\Province\App\Services\Interfaces;

use Illuminate\Http\Response;

interface DistrictServiceInterface
{
    /**
     * Summary of getCity
     */
    public function getCity(int $districtId): Response;

    /**
     * Get district by Id.
     */
    public function getDistrict(int $districtId): Response;

    /**
     * get All wards by district Id.
     */
    public function getWards(int $districtId): Response;
}
