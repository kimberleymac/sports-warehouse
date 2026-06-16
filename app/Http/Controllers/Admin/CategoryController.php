<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all categories
        $categories = Category::all();

        // Load admin index view
        return view('admin.categories.index', ["categories" =>$categories]);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Load the create/add form
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'categoryName'=> 'required|unique:categories|min:3|max:50',
        ]);

        // Create the category
        Category::create($validated);

        // Redirect the user
        // NOTE: Can add in category name to success message too
        return redirect()->route("admin.categories.index")->with("success", "category created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // TODO use this to show long category descriptions like with item descriptions where you can click show and see the full description etc...
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Load the edit form
        return view('admin.categories.edit', compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate input data
        $validated = $request->validate([
            'categoryName'=> 'required|unique:categories,categoryName|min:3|max:50',
        ]);

        // Update the category
        // TODO wrap this in a try catch incase of an error when putting into the database
        $category->update($validated);

        // Redirect the user
        // NOTE: Can add in category name to success message too
        return redirect()->route("admin.categories.index")->with("success", "category updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //Check if category has items linked

        $hasItems = Item::where('categoryId', $category->categoryId)->exists();

        // If there are events - redirect with error
        if ($hasItems)
        {
            return redirect()->route("admin.categories.index")->with("error", "category linked items!");
        }

        
        // Delete the category
        $category->delete();

        //Redirect user
        return redirect()->route("admin.categories.index")->with("success", "category deleted!");
    }
}
