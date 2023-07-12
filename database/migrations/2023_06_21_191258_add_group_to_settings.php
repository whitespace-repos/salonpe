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
        Schema::table('settings', function (Blueprint $table) {
            //            
            $table->enum("data_type",["JSON","Array","Entity","Other"])->nullable()->after("data");
            $table->string("group")->nullable()->after("data_type");
            $table->string("page")->nullable()->after("group");
            $table->boolean("active")->default(true)->after("page");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
