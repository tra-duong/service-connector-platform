<?php

namespace Modules\Province\Services;

use Illuminate\Http\Response;
use Modules\Common\Helpers\ResponseHelper;
use Modules\Province\App\Repositories\Interfaces\CityRepositoryInterface;
use Modules\Province\App\Services\Interfaces\CityServiceInterface;

class CityService implements CityServiceInterface
{
    protected CityRepositoryInterface $cityRepository;

    /**
     * Inject.
     */
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getAllCities(): Response
    {
        $cities = $this->cityRepository->getAllCities();

        return new Response($cities, ResponseHelper::HTTP_OK_STATUS);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity(int $cityId = 0): Response
    {
        $city = $this->cityRepository->getCity($cityId);

        return new Response($city, ResponseHelper::HTTP_OK_STATUS);
    }

    /**
     * {@inheritDoc}
     */
    public function getDistricts(int $cityId): Response
    {
        $districts = $this->cityRepository->getDistricts($cityId);

        return new Response($districts, ResponseHelper::HTTP_OK_STATUS);
    }

    /**
     * {@inheritDoc}
     */
    public function getWards(int $cityId): Response
    {
        $wards = $this->cityRepository->getWards($cityId);

        return new Response($wards, ResponseHelper::HTTP_OK_STATUS);
    }
}
