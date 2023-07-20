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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('address_id')->constrained('address'); 
            $table->string("coupon")->nullable();
            $table->double("coupon_discount",10,2)->default(0);           
            $table->boolean("is_gift")->default(false);
            $table->integer("quantity")->default(0);
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
        Schema::dropIfExists('carts');
    }
};
