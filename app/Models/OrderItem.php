<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'orderId',
        'itemId',
        'quantity',
        'price',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'orderId');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'itemId');
    }
}
