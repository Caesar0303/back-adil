<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json($categories, 200);
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request->validated());
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        return response()->json($category, 200);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryService->updateCategory($request->validated(), $id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = $this->categoryService->deleteCategory($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json(['message' => 'Category deleted'], 200);
    }

    public function trashed()
    {
        $categories = $this->categoryService->getTrashedCategories();
        return response()->json($categories, 200);
    }

    public function restore($id)
    {
        $category = $this->categoryService->restoreCategory($id);
        return response()->json(['message' => 'Category restored'], 200);
    }
    
    public function forceDelete($id)
    {
        $category = $this->categoryService->forceDeleteCategory($id);
        return response()->json(['message' => 'Category permanently deleted'], 200);
    }
}
