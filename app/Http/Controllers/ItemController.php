<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Attribute;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //TODO dont forget to add price formatted in the product card
    //{{ $event->price }}
    //{{ $event->price_formatted }
    /**
     * Defines a dynamic price_formatted property (Attribute Accessor)
     * Usage: $event->price_formatted
     */
    // protected function priceFormatted(): Attribute
    // {
    //     return Attribute::get(function () {
    //         // Check if event is free
    //         //if ($this->price == 0) return 'Free';

    //         // Format as price
    //         return '$' . number_format($this->price, 2);
    //     });
    // }
    
    /**
     * Display a listing of events
     */
    public function index()
    {
        // Get all items from the database (TODO : paging...)
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
}
