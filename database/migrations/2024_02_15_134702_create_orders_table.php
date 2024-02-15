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
            $table->id();
            $table->foreignId('cart_id')->constrained();
            $table->string('payment_method');
            $table->string('status');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('postcode');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('total');
            $table->string('currency');
            $table->string('transaction_id');
            $table->string('payment_status');
            $table->string('payment_details');
            $table->string('shipping_method');
            $table->string('shipping_cost');
            $table->string('shipping_details');
            $table->string('shipping_tracking_number');
            $table->string('shipping_address_1');
            $table->string('shipping_address_2');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_postcode');
            $table->string('shipping_country');

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
