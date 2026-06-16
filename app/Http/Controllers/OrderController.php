<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Checkout saved items
     *
     * @param Request $request HTTP request object
     */
    public function checkout(Request $request)
    {  
        //Validate the user's details
        $validated = $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'address' => 'required',
            'contactNumber' => 'required|digits:10',
            'email' => 'required|email',
            'creditCardNumber' => 'required',
            'expiryDate' => 'required',
            'nameOnCard' => 'required',
            'csv' => 'required|digits:3',
        ]);

        
        // Get the svaed event IDs from the session
        $savedItemIds = Session::get("saved_items", []);

        // Return error message if there are no items in the cart
        if (empty($savedItemIds)){
            return redirect()->back()->with('error', 'No items in cart');
        }

        
        // Create one order
        $order = Order::create([
            'orderDate' => now(),
            'firstName' => $validated['firstName'],
            'lastName' => $validated['lastName'],
            'address' => $validated['address'],
            'contactNumber' => $validated['contactNumber'],
            'email' => $validated['email'],
            'creditCardNumber' => $validated['creditCardNumber'],
            'expiryDate' => $validated['expiryDate'],
            'nameOnCard' => $validated['nameOnCard'],
            'csv' => $validated['csv'],
        ]);

        // Attach items to the order
        foreach ($savedItemIds as $id){
            $item = Item::find($id);
            if($item){
                $order->orderItems()->create([
                    'itemId' => $id,
                    'quantity' => 1, //Change later to support adding multiple quantities
                    'price' => $item->salePrice ?? $item->price,
                ]);
            }
        }
        
        
        // Clear the session (forget the saved items)
        Session::forget("saved_items");



        // Redirect with a success message 
        //OR load a "confirmation" view with checkout/ order details
        return redirect('/')->with("success", "Checkout completed! 🛒");


    }
}
