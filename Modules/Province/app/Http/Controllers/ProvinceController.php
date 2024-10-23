<?php

namespace Modules\Province\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Modules\Province\App\Services\Interfaces\CityServiceInterface;
use Modules\Province\App\Services\Interfaces\DistrictServiceInterface;
use Modules\Province\App\Services\Interfaces\WardServiceInterface;

class ProvinceController extends Controller
{
    protected CityServiceInterface $cityService;

    protected DistrictServiceInterface $districtService;

    protected WardServiceInterface $wardService;

    public function __construct(CityServiceInterface $cityService, DistrictServiceInterface $districtService, WardServiceInterface $wardService)
    {
        $this->cityService = $cityService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
    }

    /**
     * Get all cities.
     */
    public function getAllCities(): Response
    {
        return $this->cityService->getAllCities();
    }

    /**
     * Summary of getCityById
     */
    public function getCityById(int $cityId): Response
    {
        return $this->cityService->getCity($cityId);
    }

    /**
     * Summary of getAllDistrictsByCity
     */
    public function getAllDistrictsByCity(int $cityId): Response
    {
        return $this->cityService->getDistricts($cityId);
    }

    /**
     * Summary of getAllWardsByCity
     */
    public function getAllWardsByCity(int $cityId): Response
    {
        return $this->cityService->getWards($cityId);
    }

    /**
     * Summary of getCityByDistrictId
     */
    public function getCityByDistrictId(int $districtId): Response
    {
        return $this->districtService->getCity($districtId);
    }

    /**
     * Summary of getDistrictById
     */
    public function getDistrictById(int $districtId): Response
    {
        return $this->districtService->getDistrict($districtId);
    }

    /**
     * Summary of getAllWardsByDistrictId
     */
    public function getAllWardsByDistrictId(int $districtId): Response
    {
        return $this->districtService->getWards($districtId);
    }

    /**
     * Summary of getCityByWardId
     */
    public function getCityByWardId(int $wardId): Response
    {
        return $this->wardService->getCity($wardId);
    }

    /**
     * Summary of getDistrictByWardId
     */
    public function getDistrictByWardId(int $wardId): Response
    {
        return $this->wardService->getDistrict($wardId);
    }

    /**
     * Summary of getWardById
     */
    public function getWardById(int $wardId): Response
    {
        return $this->wardService->getWard($wardId);
    }
}
