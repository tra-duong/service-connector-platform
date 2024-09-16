<?php

namespace Modules\Category\Repositories;

use Modules\Category\Models\CategoryType;
use Modules\Common\App\Utils\CommonConstants;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Category\Repositories\Interfaces\CategoryTypeRepositoryInterface;
use Modules\Common\Helpers\StringHelper;

class CategoryTypeRepository implements CategoryTypeRepositoryInterface
{
    public function getList(): ?LengthAwarePaginator
    {
        dd(StringHelper::buildMachineName('1212121fdf asdasd'));
        dd(CommonConstants::DEFAULT_PAGING);

        return CategoryType::paginate(CommonConstants::DEFAULT_PAGING);
    }

}
