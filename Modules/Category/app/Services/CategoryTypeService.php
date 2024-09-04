<?php

namespace Modules\Category\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Modules\Category\Repositories\Interfaces\CategoryTypeRepositoryInterface;
use Modules\Category\Services\Interfaces\CategoryTypeServiceInterface;

class CategoryTypeService implements CategoryTypeServiceInterface
{
    protected CategoryTypeRepositoryInterface $categoryTypeRepository;

    public function __construct(CategoryTypeRepositoryInterface $categoryTypeRepository)
    {
        $this->categoryTypeRepository = $categoryTypeRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getList(Request $request): ?LengthAwarePaginator
    {
        try {
            return $this->categoryTypeRepository->getList();
        } catch (Exception $e) {
            Log::error('Get list: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getPrototype(Request $request): ?array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function add(Request $request): ?array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function update(Request $request): ?array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function delete(Request $request): ?array
    {
        return [];
    }
}
