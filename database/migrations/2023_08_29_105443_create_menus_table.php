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
        Schema::create('menus', function (Blueprint $table) {
            $table->string('menu_id')->primary();
            $table->string('name');
            $table->longText('description');
            $table->string('size')->nullable();
            $table->string('extra')->nullable();
            $table->string('price');
            $table->string('discount');
            $table->string('cat_id');
            $table->string('sub_cat_id');
            $table->longText('reviews')->nullable();
            $table->tinyInteger('status');
            $table->string('image');
            $table->timestamps();

            $table->foreign('cat_id')->references('cat_id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_cat_id')->references('sub_cat_id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
