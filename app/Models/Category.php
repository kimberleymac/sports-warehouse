<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{

    //Tells laravel that the primary key is called categoryId

    protected $primaryKey = 'categoryId';

    // Allow mass assignment (multiple property values at once)
    protected $fillable = [
        'categoryName',
        'slug',
    ];


    /**
     * Get items for the category.
     * One category can have many items
     *
     * @return HasMany Collection of items
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    // TODO How to deal with duplicate names in the database for slug??

   /**
    *  Creates a slug from the category name
    *
    * @return Attribute
    */
    protected function categoryName(): Attribute
    {
        return Attribute::make(
            set: function ($value){
                $slug = Str::slug($value);
            
                return [
                    'categoryName' => $value,
                    'slug' => $slug
                ];
            }
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}

