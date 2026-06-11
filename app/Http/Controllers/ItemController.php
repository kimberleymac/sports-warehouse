<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    
    /**
     * Display a listing of items
     */
    public function index()
    {
        // Get all items from the database
        //$items = Item::all();
        // TODO: Simple pagination
        $items = Item::simplePaginate(15);

        // Pass data into the view
        return view('products', ["items" => $items]);
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

    /**
     * Save an item to session memory
     *
     * @param integer $id ITEM ID
     */
    public function save(int $id)
    {  
        // Get the current list of saved events (from session)
        // Default to empty list
        // Save it into a variable
        // $savedItems = session()->get("saved_items", []);
        $savedItems = Session::get("saved_items",[]);
        
        // Add the new event ID to the list (if its's not already there)
        // Needle in a haystack
        if (!in_array($id, $savedItems)) {
            $savedItems[] = $id;
        }
        
        // Save the updated list (into session)
        //session()->put("saved_items", $savedItems);
        Session::put("saved_items", $savedItems);

        //Force session save
        //Session::save();
        
        // Redirsct user back where they came from
        return redirect()->back()->with("success", "Item saved! 🛒");
    }


    /**
     * Remove an item from session memory
     *
     * @param integer $id ITEM ID
     */
    public function unsave(int $id)
    {  
        // Get the current list of saved events (from session)
        $savedItems = Session::get("saved_items",[]);
        
        //Remove event from the list only if it exists
        if(($key = array_search($id, $savedItems))!== false) {
            unset($savedItems[$key]);
        }

        // Condense the array to cover the gap of the missing value
        $savedItems = array_values($savedItems);

        
        // Save the updated list (into session)
        Session::put("saved_items", $savedItems);

        //Force session save
        //Session::save();
        
        // Redirsct user back where they came from
        return redirect()->back()->with("message", "Item unsaved! 🛒");
    }

    /**
     * Display a list of saved items
     */

    public function showSaved()
    {
        // Get saved event IDs
        $savedItemIds = Session::get("saved_items", []);

        //Fetch the items from the DB
        $items = Item::whereIn("itemId", $savedItemIds)->get();

        // Pass data into the view
        return view('saved', ["items" => $items]);
    }

    //  /**
    //  * Display details of a single item
    //  *
    //  * @param integer $id ITEM ID
    //  */
    // public function show(int $id)
    // {  
    
    // // Find item details (404 error if not found)
    //     $item = Item::findOrFail($id);

    //     // Pass data into the view
    //     return view('show_product', ["item" => $item]);
    // }
    
    /**
     * Display details of a single item
     * updated for slug implementation
     * 
     */
    public function show(Item $item)
    {

        // Pass data into the view
        return view('show_product', [
            "item" => $item, 
            ]);
    }





}