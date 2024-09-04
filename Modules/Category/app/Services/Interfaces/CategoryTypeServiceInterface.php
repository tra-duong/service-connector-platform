<?php

namespace Modules\Category\Services\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryTypeServiceInterface
{
    /**
     * Summary of list
     *
     * @return void
     */
    public function getList(Request $request): ?LengthAwarePaginator;

    /**
     * Build element
     *
     * @return void
     */
    public function getPrototype(Request $request): ?array;

    /**
     * Add item
     *
     * @return void
     */
    public function add(Request $request): ?array;

    /**
     * Update item
     *
     * @return void
     */
    public function update(Request $request): ?array;

    /**
     * Delete.
     *
     * @return void
     */
    public function delete(Request $request): ?array;
}
