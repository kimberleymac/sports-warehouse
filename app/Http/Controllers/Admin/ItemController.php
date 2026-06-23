<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all items
        $items = Item::all();

        // Load admin view
        return view('admin.items.index', ["items" => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // So we can access the category names
        $categories = Category::all();

        // Load the create/add form
        return view('admin.items.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    

        //Validate input data
        $validated = $request->validate([
            'itemName' => 'required|unique:items,itemName|min:3|max:150',
            'photo' => 'nullable|image|mimes:jpg,png,webp|max:2048', //Max 2MB
            'price' => 'required|numeric|decimal:0,2|min:0',
            'salePrice' => 'nullable|numeric|decimal:0,2|min:0',
            'description' => 'min:3|max:150',
            'featured' => 'boolean',
            'categoryId' => 'required|exists:categories,categoryId', // Which category does it belong to & make sure it exists
        ]);

        // photo upload copies from update()
        if ($request->hasFile('photo')){

            // TODO EXAMPLE: FOR EDIT FUNCTIONALITY delete image if new one is given
            //Save images to "public/images/events" (basic file move)
            // TODO make unique file name, like including sku and making name SEO keyword friendly

            $file = $request->file("photo");
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/products/'), $filename);

            // Make sure filename goes into the DB
            $validated['photo'] = $filename;

        }

        // Create the item
        $item = Item::create($validated);

        //Redirect the user
        return redirect()->route('admin.items.index')->with("success", "Item '{$item->itemName}' created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO use this to show long item descriptions where you can click show and see the full description etc...
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        // Returns item if it exists
        //$item = Item::findOrFail($id);

        // So we can access the category names
        $categories = Category::all();

        // Load the edit form
        return view('admin.items.edit', compact("item", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // Validate input data
        // Can't use unique here as it will cause error
        $validated = $request->validate([
            'itemName' => 'required|min:3|max:150',
            'photo' => 'nullable|image|mimes:jpg,png,webp|max:2048', //Max 2MB
            'price' => 'required|numeric|decimal:0,2|min:0',
            'salePrice' => 'nullable|numeric|decimal:0,2|min:0',
            'description' => 'min:3|max:150',
            'featured' => 'boolean',
            'categoryId' => '', // Which category does it belong to?
        ]);

        // Set a default false value for "featured" if undefined
        $validated["featured"] = $validated["featured"] ?? false;

        // Check if image uploaded
        if ($request->hasFile('photo')){

            // Save image to ""public/images/products (Storage facade)
            // $path = $request->file("photo")->store("images/products","public");
            // $validated["photo"] = $path;

            // TODO EXAMPLE: FOR EDIT FUNCTIONALITY delete image if new one is given
            // Add this image thing in an if statement
            // Storage::disk("public")->delete($item->image)

            //Save images to "public/images/events" (basic file move)
            // TODO make unique file name, like including sku and making name SEO keyword friendly
            $file = $request->file("photo");
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/products/'), $filename);

            // Make sure filename goes into the DB
            $validated['photo'] = $filename;

        }

        // Update the item
        // TODO wrap this in a try catch incase of an error when putting into the database
        $item->update($validated);

        // Redirect the user
        return redirect()->route('admin.items.index')->with("success", "Item '{$item->itemName}' updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // Check if the item is linked in order_items
        $hasOrders = OrderItem::where('itemId', $item->id)->exists();

        // If there are items - redirect with error
        if($hasOrders){
            return redirect()
            ->route('admin.items.index')
            ->with('error', 'Cannot delete this item: it is linked to existing orders');
        }

        $item->delete();

        return redirect()
        ->route('admin.items.index')
        ->with("success", "Item '{$item->itemName}' deleted");
    }
}
