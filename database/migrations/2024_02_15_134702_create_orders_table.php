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
            $table->string('payment_method')->default('bacs');
            $table->string('payment_method_title')->default('Bank Transfer');
            $table->boolean('set_paid')->default(false);

            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_address_1');
            $table->string('billing_address_2');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_postcode');
            $table->string('billing_country');
            $table->string('billing_email');
            $table->string('billing_phone');

            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_address_1');
            $table->string('shipping_address_2');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_postcode');
            $table->string('shipping_country');

            $table->string('shipping_tracking_number')->default('null');

            $table->string('shipping_lines_method_id')->default('flat_rate');
            $table->string('shipping_lines_method_title')->default('Flat Rate');
            $table->string('shipping_lines_total')->default('0');

            $table->string('order_id')->nullable();
            $table->string('order_key')->nullable();
            $table->string('order_status')->default('pending');
            $table->string('order_currency')->default(config('webshop.default_currency'));
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
