<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function categories() {
        $categories = Category::all();
        return $categories;
    }

    public function create() {
        $categories = Category::all();
        return $categories;
    }

    public function store() {
        $category = new Category;
        $category->name = request()->name;
        $category->save();
        return 200;
    }

    public function delete($id) {
        $category = Category::find($id);
        return $category;

//        $category->delete();

//        return $category;
    }

}
