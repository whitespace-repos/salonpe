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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts');
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('product_attribute_id')->constrained('product_attributes');
            $table->json("product")->nullable();
            $table->json("attribute")->nullable();            
            $table->boolean("is_gift")->default(false);
            $table->integer("quantity")->default(0);
            $table->double("mrp",10,2)->default(0);
            $table->double("applied_price",10,2)->default(0);
            $table->double("payble_price",10,2)->default(0);
            $table->double("grand_total",10,2)->default(0);
            $table->double("discount",10,2)->default(0);
            $table->boolean("status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
