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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->tinyInteger('placed_status');
            $table->dateTime('placed_status_timestamp');
            $table->tinyInteger('confirmed_status')->nullable();
            $table->dateTime('confirmed_status_timestamp')->nullable();
            $table->tinyInteger('ready_status')->nullable();
            $table->dateTime('ready_status_timestamp')->nullable();
            $table->tinyInteger('delivered_status')->nullable();
            $table->dateTime('delivered_status_timestamp')->nullable();
            $table->tinyInteger('cancelled_status')->nullable();
            $table->dateTime('cancelled_status_timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
    }
};
