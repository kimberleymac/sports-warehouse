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
        'orderNumber',
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
     * Generate a unique order number for each order
     */
    
    // Runs automatically when the model is first loaded
    public static function boot()
    {
        // run the base eloquent model setup first
        parent::boot();

        // event listener for when a new order is created
        static::creating(function($order){
            // if the order number is empty use the generated order number function
            if (empty($order->orderNumber)){
                $order->orderNumber = self::generateOrderNumber();
            }
        });
    }

    // generate order number - returns a string
    public static function generateOrderNumber(): string
    {
        // Format INV26-000001 and resets every year    
        $year = now()->format('Y');           // 2026
        $prefix = 'INV' . substr($year, -2);  // INV26
        // Get the most recent order created
        $lastOrder = self::whereYear('created_at', $year)
                        ->orderBy('orderId', 'desc')
                        ->first();

        $sequence = 1;
        // if a previous order exists, take the last 6 characters, convert to an interger and add 1
        if ($lastOrder && $lastOrder->orderNumber) {
            // Extract the number after the hyphen, explode separates the string
            $parts = explode('-', $lastOrder->orderNumber);
            if (count($parts) > 1) {
                $sequence = (int) $parts[1] + 1;
            }
        }
        // concatinate all the parts together
        return $prefix . '-' . str_pad($sequence, 6, '0', STR_PAD_LEFT);
    }


    
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
