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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string("brand_code")->nullable();
            $table->string("name")->nullable();
            $table->string("tag")->nullable();
            $table->string("logo")->nullable();
            $table->string("image")->nullable();
            $table->text("description")->nullable();
            $table->integer("top_brand_list");
            $table->integer("top_brand_logo");
            $table->integer("landing_page");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
