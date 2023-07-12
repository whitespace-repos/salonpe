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
        Schema::table('media', function (Blueprint $table) {
            //    
            $table->string("name")->nullable()->after("featured");
            $table->string("author")->nullable()->after("name");
            $table->string("size")->nullable()->after("author");
            $table->string("format")->nullable()->after("size");
            $table->boolean("active")->default(true)->after("format");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            //
        });
    }
};
