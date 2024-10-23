<?php

namespace Modules\Province\App\Services\Interfaces;

use Illuminate\Http\Response;

interface CityServiceInterface
{
    /**
     * Get all cities.
     */
    public function getAllCities(): Response;

    /**
     * Get city by Id
     */
    public function getCity(int $cityId): Response;

    /**
     * Get districts by city ID.
     */
    public function getDistricts(int $cityId): Response;

    /**
     * Get all wards belongs to City.
     */
    public function getWards(int $cityId): Response;
}
