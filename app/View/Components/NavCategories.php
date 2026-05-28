<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavCategories extends Component
{
    //Store a list of categories
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Category::orderBy("categoryName")->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-categories');
    }
}
