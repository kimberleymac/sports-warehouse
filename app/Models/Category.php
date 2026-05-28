<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //

    //Tells laravel that the primary key is called categoryId

    protected $primaryKey = 'categoryId';


    /**
     * Get items for the category.
     *
     * @return HasMany Collection of items
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

}
