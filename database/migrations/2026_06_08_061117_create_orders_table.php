<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderId');
            $table->foreignId('itemId')->constrained('items', 'itemId'); // Link to the items table
            $table->dateTime('orderDate');
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->string('address', 200);
            $table->string('contactNumber', 20);
            $table->string('email', 255);
            $table->string('creditCardNumber', 20);
            $table->string('expiryDate', 10);
            $table->string('nameOnCard', 50);
            $table->string('csv', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
