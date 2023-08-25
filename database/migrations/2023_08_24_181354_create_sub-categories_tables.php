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
        Schema::create('sub-categories', function (Blueprint $table) {
            $table->string('sub_cat_id')->primary();
            $table->string('name')->unique();
            $table->string('image');
            $table->string('cat_id');
            $table->timestamps();

            $table->foreign('cat_id')->references('cat_id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
-        Schema::dropIfExists('sub-categories');
    }
};
