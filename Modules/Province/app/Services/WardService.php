<?php

namespace Modules\Province\Services;

use Illuminate\Http\Response;
use Modules\Common\Helpers\ResponseHelper;
use Modules\Province\App\Repositories\Interfaces\WardRepositoryInterface;
use Modules\Province\App\Services\Interfaces\WardServiceInterface;

class WardService implements WardServiceInterface
{
    protected WardRepositoryInterface $wardRepository;

    public function __construct(WardRepositoryInterface $wardRepository)
    {
        $this->wardRepository = $wardRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getCity(int $wardId): Response
    {
        $city = $this->wardRepository->getCity($wardId);

        return new Response($city, ResponseHelper::HTTP_OK_STATUS);
    }

    /**
     * {@inheritDoc}
     */
    public function getDistrict(int $wardId): Response
    {
        $district = $this->wardRepository->getDistrict($wardId);

        return new Response($district, ResponseHelper::HTTP_OK_STATUS);
    }

    /**
     * {@inheritDoc}
     */
    public function getWard(int $wardId): Response
    {
        $ward = $this->wardRepository->getWard($wardId);

        return new Response($ward, ResponseHelper::HTTP_OK_STATUS);
    }
}
