<?php

namespace Modules\Category\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getList(): ?LengthAwarePaginator
    {
        dd(Category::paginate());

        return Category::paginate();
    }
}
