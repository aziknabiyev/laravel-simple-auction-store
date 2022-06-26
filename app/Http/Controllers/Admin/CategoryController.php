<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index():View
    {
        $categories=Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create():View
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('admin.categories.index')->with('status', 'Category created!');
    }


    public function show(Category $category)
    {
        return view('admin.categories.view',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.update',compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('status', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count()) {
            return back()->withErrors(['error' => "Cannot delete, $category->name has products."]);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Category deleted!');
    }
}
