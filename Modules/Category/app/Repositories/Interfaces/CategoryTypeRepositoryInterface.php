<?php

namespace Modules\Category\Repositories\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryTypeRepositoryInterface
{
    public function getList(): ?LengthAwarePaginator;
}
