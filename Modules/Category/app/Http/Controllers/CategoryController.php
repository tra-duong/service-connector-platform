<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Services\Interfaces\CategoryServiceInterface;

class CategoryController extends Controller
{
    protected CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * List category types.
     */
    public function list(Request $request)
    {
        return $this->categoryService->getList($request);
    }

    /**
     * Get builder ?
     */
    public function build()
    {
        return view('category::index');
    }

    /**
     * Add category type.
     */
    public function add()
    {
        return view('category::index');
    }

    /**
     * Delete category type.
     */
    public function delete()
    {
        return view('category::index');
    }
}
