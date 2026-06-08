<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display details of a single item
     *
     * 
     */
    // public function show(int $id)
    // {
    //     // Find item details (404 error if not found)
    //     $category = Category::findOrFail($id);
        
    //     // Find all items in the category
    //     $items = Item::where("categoryId", $id)->get();

    //     // Pass data into the view
    //     return view('show_category', ["category" => $category, 'items' => $items]);
    // }

    public function show(Category $category)
    {
        // Find all items in the category
        $items = Item::where('categoryId', $category->categoryId)->get();

        // Pass data into the view
        return view('show_category', [
            "category" => $category, 
            'items' => $items
            ]);
    }


}
