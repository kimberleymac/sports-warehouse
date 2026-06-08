<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Attribute;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    /**
     * Display a listing of items
     */
    public function index()
    {
        // Get all items from the database ( //TODO : paging...)
        $items = Item::all();

        // Pass data into the view
        return view('products', ["items" => $items]);
    }

    /**
     * Display details of a single item
     *
     * @param integer $id ITEM ID
     */
    public function show(int $id)
    {  
    
    // Find item details (404 error if not found)
        $item = Item::findOrFail($id);

        // Pass data into the view
        return view('show_product', ["item" => $item]);
    }

        /**
     * Display details of a search using keyword
     *
     * @param Request $request HTTP request object
     */
    public function search(Request $request)
    {  
        //Get the user "keyword" pased via a query string
        $searchTerm = $request->input("keyword");
    
        // Search for products/ items using the search term IF one was provided
        // ->when() conditonally runs the next bit of code
        $items = Item::query()->when($searchTerm, function ($query, $search){
            // Filter by itemName    
            return $query->where("itemName", "like", "%{$search}%")->get();
        });

        // Pass data into the view
        return view('search', ["items" => $items, "searchTerm" => $searchTerm]);
    }
}
