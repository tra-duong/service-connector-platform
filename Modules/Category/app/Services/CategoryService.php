<?php

namespace Modules\Category\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Category\Services\Interfaces\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getList(Request $request): ?LengthAwarePaginator
    {
        try {
            dd($this->categoryRepository->getList());
            return $this->categoryRepository->getList();
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
