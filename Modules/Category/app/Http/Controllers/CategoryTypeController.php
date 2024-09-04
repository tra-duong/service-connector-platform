<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Services\Interfaces\CategoryTypeServiceInterface;

class CategoryTypeController extends Controller
{
    protected CategoryTypeServiceInterface $categoryService;

    public function __construct(CategoryTypeServiceInterface $categoryService)
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
