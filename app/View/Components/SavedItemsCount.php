<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class SavedItemsCount extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    // public function render(): View|Closure|string
    // {
    //     return view('components.saved-items-count');
    // }


    /**
     * Saved item count for component
     */

    public function render(){
        // If we ever add saved items to the database we can use
        // $count = Item::where('saved, 1)->count();

        // count items saved to the session
        // $count = count(session('saved_items', []));

        // Refactored for cart quantities
        $count = collect(Session::get('cart', []))->sum('quantity');

        return view('components.saved-items-count', ['count'=> $count]);
    }


}
