<?php

namespace Modules\Province\App\Repositories\Interfaces;

use Modules\Province\Models\City;
use Modules\Province\Models\District;

interface DistrictRepositoryInterface
{
    /**
     * Get city by by district Id.
     *
     * @return void
     */
    public function getCity(int $districtId): ?City;

    /**
     * Get district by Id.
     *
     * @return void
     */
    public function getDistrict(int $districtId): ?District;

    /**
     * get All wards by district Id.
     *
     * @return void
     */
    public function getWards(int $districtId): ?array;
}
