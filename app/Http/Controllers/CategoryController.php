<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $categories = Category::paginate(3);
        return inertia('Categories/index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Categories/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->validated());
            return redirect()->route('categories.index')->with('success', 'Create category satisfaction.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Create category crash.');            
        }
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
        return inertia('Categories/edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
             return redirect()->route('categories.index')->with('success', 'Update category satisfaction.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Update category crash.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Delete category satisfaction.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Delete category crash.');
        }
    }
}
