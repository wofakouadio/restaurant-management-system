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
            $table->string('order_id')->primary();
            $table->string('menu_id');
            $table->string('menu_name');
            $table->string('price');
            $table->string('quantity');
            $table->string('total_price');
            $table->longText('remarks')->nullable();
            $table->string('payment_method');
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');
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
