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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->text("address_1")->nullable();
            $table->text("address_2")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("company")->nullable();
            $table->string("state")->nullable();
            $table->string("zip")->nullable();
            $table->string("country")->nullable();
            $table->foreignId('customer')->constrained('users');
            $table->string("plain")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
