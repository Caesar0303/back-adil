<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function createCategory($data)
    {
        return Category::create($data);
    }

    public function getCategoryById($id)
    {
        return Category::find($id);
    }

    public function updateCategory($data, $id)
    {
        $category = $this->getCategoryById($id);
        if ($category) {
            $category->update($data);
        }
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->getCategoryById($id);
        if ($category) {
            $category->delete();
        }
        return $category;
    }

    public function getTrashedCategories()
    {
        return Category::onlyTrashed()->get();
    }

    public function restoreCategory($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return $category;
    }

    public function forceDeleteCategory($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return $category;
    }
}
