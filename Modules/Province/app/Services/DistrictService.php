<?php

namespace Modules\Province\Services;

use Illuminate\Http\Response;
use Modules\Common\Helpers\ResponseHelper;
use Modules\Province\App\Repositories\Interfaces\DistrictRepositoryInterface;
use Modules\Province\App\Services\Interfaces\DistrictServiceInterface;

class DistrictService implements DistrictServiceInterface
{
    protected DistrictRepositoryInterface $districtRepository;

    public function __construct(DistrictRepositoryInterface $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function getCity(int $districtId): Response
    {
        $city = $this->districtRepository->getCity($districtId);

        return new Response($city, ResponseHelper::HTTP_OK_STATUS);
    }

    /**
     * Get district by Id.
     *
     * @return void
     */
    public function getDistrict(int $districtId): Response
    {
        $district = $this->districtRepository->getDistrict($districtId);

        return new Response($district, ResponseHelper::HTTP_OK_STATUS);
    }

    /**
     * get All wards by district Id.
     *
     * @return void
     */
    public function getWards(int $districtId): Response
    {
        $wards = $this->districtRepository->getWards($districtId);

        return new Response($wards, ResponseHelper::HTTP_OK_STATUS);
    }
}
