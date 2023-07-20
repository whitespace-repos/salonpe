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
            $table->foreignId('cart_id')->constrained('carts');
            $table->foreignId('user_id')->constrained('users'); 
            $table->foreignId('address_id')->constrained('address'); 
            $table->integer("quantity")->default(0);
            $table->double("mrp",10,2)->default(0);            
            $table->double("applied_price",10,2)->default(0);
            $table->double("payble_price",10,2)->default(0);
            $table->double("grand_total",10,2)->default(0);
            $table->double("discount",10,2)->default(0);
            $table->boolean("payment")->default(false);
            $table->string("payment_id")->nullable();
            $table->boolean("delivered")->default(false);
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
