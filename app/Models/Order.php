<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    //Tells laravel that the primary key is called itemId

    protected $primaryKey = 'orderId';


    // Allow mass assignment (multiple property values at once)
    protected $fillable = [
        'orderDate',
        'firstName',
        'lastName',
        'address',
        'contactNumber',
        'email',
        'creditCardNumber',
        'expiryDate',
        'nameOnCard',
        'csv',
    ];

    // Cast fields as specific data types
    protected $casts = [
        'orderDate' => 'datetime',
    ];
    
    /**
     * Get items for the order.
     * One order can have many items.
     *
     * @return HasMany Collection of items
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'orderId');
    }
}
