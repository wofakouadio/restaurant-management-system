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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userid')->unique();
            $table->string('sur_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->string('main_address');
            $table->string('secondary_address')->nullable();
            $table->string('primary_contact');
            $table->string('secondary_contact')->nullable();
            $table->string('email')->unique();
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture');
            $table->tinyInteger('role_type');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
