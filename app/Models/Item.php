<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;

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

    //
    /**
     * Get category for the item.
     *
     * @return BelongsTo Category for item
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
