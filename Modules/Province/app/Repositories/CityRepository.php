<?php

namespace Modules\Province\Repositories;

use Modules\Province\App\Repositories\Interfaces\CityRepositoryInterface;
use Modules\Province\Models\City;

class CityRepository implements CityRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAllCities(): ?array
    {
        return City::all()->toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function getCity(int $cityId): ?City
    {
        return City::find($cityId);
    }

    /**
     * {@inheritDoc}
     */
    public function getDistricts(int $cityId): ?array
    {
        return City::find($cityId)->districts();
    }

    /**
     * {@inheritDoc}
     */
    public function getWards(int $cityId): ?array
    {
        return City::find($cityId)->wards();
    }
}
