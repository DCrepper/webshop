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
        Schema::create('woocommerce_product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('slug')->default('');
            $table->unsignedBigInteger('parent')->nullable();
            $table->string('description')->nullable();
            $table->string('display')->default('default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('woocommerce_product_categories');
    }
};
