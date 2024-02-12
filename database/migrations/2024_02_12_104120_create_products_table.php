<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
            $table->text('type');
            $table->text('status');
            $table->text('catalog_visibility');
            $table->text('description');
            $table->text('short_description');
            $table->string('sku')->nullable(false)->unique();
            $table->text('price');
            $table->text('regular_price');
            $table->text('sale_price');
            $table->text('stock_quantity');
            $table->text('stock_status');
            $table->text('weight');
            $table->text('length');
            $table->text('width');
            $table->text('height');
            $table->text('shipping_class');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
