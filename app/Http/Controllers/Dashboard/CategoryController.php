<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();
        return $categories;
    }

    public function store(Request $request)
    {
        $category = Category::create($request->only('name'));

        return $category;
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->only('name'));

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return 'Deleted Successfully!';
    }
}
