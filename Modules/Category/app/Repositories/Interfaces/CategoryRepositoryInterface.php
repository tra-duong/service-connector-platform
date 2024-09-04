<?php

namespace Modules\Category\Repositories\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface
{
    /**
     * Get list of categories.
     */
    public function getList(): LengthAwarePaginator;
}
