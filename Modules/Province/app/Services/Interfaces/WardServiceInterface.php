<?php

namespace Modules\Province\App\Services\Interfaces;

use Illuminate\Http\Response;

interface WardServiceInterface
{
    /**
     * Get city by ward Id.
     */
    public function getCity(int $wardId): Response;

    /**
     * Get district by ward Id.
     */
    public function getDistrict(int $wardId): Response;

    /**
     * Get ward by ward Id.
     */
    public function getWard(int $wardId): Response;
}
