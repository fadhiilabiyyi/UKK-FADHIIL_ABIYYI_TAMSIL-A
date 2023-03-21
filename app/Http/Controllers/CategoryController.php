<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search by Name
        $categories = Category::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%");
        })->orderBy('created_at', 'desc')->paginate(5);

        $categories->appends($request->only('search'));

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');
        Category::create($validatedData);
        return redirect(route('categories.index'))->with('success', 'New Category has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required'
        ];
        if ($request['name'] != $category['name']) {
            $rules['name'] = 'required|unique:categories';
        }
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');
        Category::where('id', $category->id)->update($validatedData);
        return redirect(route('categories.index'))->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect(route('categories.index'))->with('success', 'Category has been delete');
    }
}
