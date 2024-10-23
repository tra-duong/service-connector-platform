<?php

namespace Modules\Province\App\Repositories\Interfaces;

use Modules\Province\Models\City;
use Modules\Province\Models\District;
use Modules\Province\Models\Ward;

interface WardRepositoryInterface
{
    /**
     * Get city of ward by ward Id.
     *
     * @return void
     */
    public function getCity(int $wardId): ?City;

    /**
     * Get District by ward Id.
     *
     * @return void
     */
    public function getDistrict(int $wardId): ?District;

    /**
     * Get ward by ward id.
     *
     * @return void
     */
    public function getWard(int $wardId): ?Ward;
}
