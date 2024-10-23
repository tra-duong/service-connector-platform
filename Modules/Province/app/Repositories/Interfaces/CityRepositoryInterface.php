<?php

namespace Modules\Province\App\Repositories\Interfaces;

use Modules\Province\Models\City;

interface CityRepositoryInterface
{
    /**
     * Get all cities.
     *
     * @return void
     */
    public function getAllCities(): ?array;

    /**
     * Get city by city ID.
     *
     * @return void
     */
    public function getCity(int $cityId): ?City;

    /**
     * Get all districts by city ID.
     *
     * @return void
     */
    public function getDistricts(int $cityId): ?array;

    /**
     * Get all wards belongs to city by city ID.
     *
     * @return void
     */
    public function getWards(int $cityId): ?array;
}
