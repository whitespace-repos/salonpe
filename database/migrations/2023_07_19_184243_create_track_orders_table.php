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
        Schema::create('track_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('user_id')->constrained('users');     
            $table->boolean("confirmed")->default(false);
            $table->timestamp('confirmed_at')->nullable();
            $table->boolean("shipped")->default(false);
            $table->timestamp('shipped_at')->nullable();
            $table->boolean("on_the_way")->default(false);                        
            $table->boolean("delivered")->default(false);            
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track_orders');
    }
};
