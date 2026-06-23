<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Override;

class Item extends Model
{
    //Tells laravel that the primary key is called itemId

    protected $primaryKey = 'itemId';


    // Allow mass assignment (multiple property values at once)
    protected $fillable = [
        'itemName',
        'photo',
        'price',
        'salePrice',
        'description',
        'featured',
        'categoryId',
        'slug',
    ];

    // Cast fields as specific data types
    protected $casts = [
        'price' => 'decimal:2',
        'salePrice' => 'decimal:2',
        'featured' => 'boolean',
        'categoryId' => 'integer',
    ];

    /**
     * Defines a dynamic image_url property (Attribute Accessor)
     * Usage: $item->image_url
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            // Check if item has an image and if the file actually exists
            if ($this->photo && File::exists(public_path('images/products/' . $this->photo))) {
                return asset('images/products/' . $this->photo);
            }

            // Fallback to a placeholder image
            return asset('images/placeholder-image.png');
        });
    }

        //TODO Fix up this section to automatically add in $ for the products
    //{{ $item->price }}
    //{{ $item->price_formatted }
    /**
     * Defines a dynamic price_formatted property (Attribute Accessor)
     * Usage: $item->price_formatted
     */
    // protected function priceFormatted(): Attribute
    // {
    //     return Attribute::get(function () {
    //         // Check if item is free
    //         //if ($this->price == 0) return 'Free';

    //         // Format as price
    //         return '$' . number_format($this->price, 2);
    //     });
    // }


    /**
     * Defines a dynamic is_saved property (attrubute Accessor)
     * 
     * Usage: $item->is_saved
     *
     * @return Attribute
     */
    protected function isSaved(): Attribute
    {
        return Attribute::get(function(){

        //Get the current list of 
        $savedItems = Session::get("saved_items", []);

        //Check if item is saved in the session
        return in_array($this->itemId, $savedItems);

        });
    }

    //
    /**
     * Get category for the item.
     *
     * @return BelongsTo Category for item
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId', 'categoryId');
    }


    // TODO How to deal with duplicate names in the database for slug??
    /**
     * Creates a slug from the category name
     *
     * @return Attribute
     */
    protected function itemName(): Attribute
    {
        return Attribute::make(
            set: function($value)
            {
                $slug = Str::slug($value);

                return [
                    'itemName' => $value,
                    'slug' => $slug,
                ];
            }
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }




}
