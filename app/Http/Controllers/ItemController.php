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
     * Add an item to the cart
     *
     * @param integer $id ITEM ID
     */
    public function save(Item $item)
    {  
        // Get the current list of saved events (from session)
        // Default to empty list
        // Save it into a variable
        // $savedItems = session()->get("saved_items", []);
        // $savedItems = Session::get("saved_items",[]);
        
        // Refactored for cart quantity calculation
        // Get list of saved cart items from the session
        $cart = Session::get("cart", []);
        
        // // Add the new event ID to the list (if its's not already there)
        // // Needle in a haystack
        // if (!in_array($id, $savedItems)) {
        //     $savedItems[] = $id;
        // }

        // Refactored for cart quantity calculation
        //If the item does not exist in the cart, add it with quantity of 1
        if(!isset($cart[$item->itemId])){
            $cart[$item->itemId] = ['quantity' => 1];
        }
        else{
            $cart[$item->itemId]['quantity']++; // If it already exists increase by 1
        }
        
        // // Save the updated list (into session)
        // //session()->put("saved_items", $savedItems);
        // Session::put("saved_items", $savedItems);

        // Refactored for cart quantity calculation
        // Save the updated cart
        Session::put("cart", $cart);

        // //Force session save
        // //Session::save();
        
        // // Redirsct user back where they came from
         return redirect()->back()->with("success", "Item added to cart! 🛒");
    }

    /**
     * Update the quantity of an item in the cart
     */
    public function updateQuantity(Request $request, Item $item)
    {
        // Make sure the quantity is a postiive number
        $request->validate([
            'quantity'=>'required|integer|min:1'
        ]);

        // Get the cart
        $cart = Session::get("cart",[]);

        // Only update if the item is in the cart
        if(isset($cart[$item->itemId])){
            $cart[$item->itemId]['quantity'] = $request->quantity;
            Session::put("cart", $cart);
        }

        return redirect()->back()->with("success", "Quantity updated");
    }


    /**
     * Remove an item from session memory
     * Remove an item from the cart
     *
     * @param integer $id ITEM ID
     */
    public function unsave(Item $item)
    {  
        // Get the current list of saved items (from session)
        // $savedItems = Session::get("saved_items",[]);

        // Refactored for cart quantity calculation
        $cart = Session::get("cart",[]);
        
        //Remove item from the list only if it exists
        // if(($key = array_search($id, $savedItems))!== false) {
        //     unset($savedItems[$key]);
        // }
        
        // Shorter version - remove item from list is it exists
        unset($cart[$item->itemId]);

        // Condense the array to cover the gap of the missing value
        // $savedItems = array_values($savedItems);
        
        // Save the updated list (into session)
        //Session::put("saved_items", $savedItems);
        Session::put("cart", $cart);

        //Force session save
        //Session::save();
        
        // Redirsct user back where they came from
        return redirect()->back()->with("message", "Item removed from the cart! 🛒");
    }

    /**
     * Display a list of saved items (saved page)
     */

    public function showSaved()
    {
        // Get saved event IDs
        //$savedItemIds = Session::get("saved_items", []);

        // Refactored for cart quantity calculation
        // Get the cart from the session
        $cart = Session::get("cart", []);

        // Get all item IDs from the cart
        $itemIds = array_keys($cart);

        //Fetch the items from the DB
        // $items = Item::whereIn("itemId", $savedItemIds)->get();
        $items = Item::whereIn("itemId", $itemIds)->get();

        // Attach the quantity to each item
        foreach ($items as $item){
            $item->quantity = $cart[$item->itemId]['quantity'] ?? 1;
        }

        // Pass data into the view
        return view('saved', ["items" => $items]);
    }

    /**
     * Display a list of saved items (cart page)
     */

    // public function showCheckout()
    // {

    //     // Get the cart from the session
    //     $cart = Session::get("cart", []);

    //     // Get all item IDs from the cart
    //     $itemIds = array_keys($cart);

    //     //Fetch the items from the DB
    //     $items = Item::whereIn("itemId", $itemIds)->get();

    //     // Attach the quantity to each item
    //     foreach ($items as $item){
    //         $item->quantity = $cart[$item->itemId]['quantity'] ?? 1;
    //     }

    //     // Pass data into the view
    //     return view('checkout', ["items" => $items]);
    // }

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