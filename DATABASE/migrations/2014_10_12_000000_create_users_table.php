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
            $table->string('name')->nullable();
            $table->string('phone')->require()->uniqid();
            $table->string('email')->nullable()->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('account_type', ['care_giver', 'care_taker'])->nullable();
            $table->string('division')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('nid_image')->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->string('service')->nullable();
            $table->string('budget')->nullable();
            $table->string('profile_heading')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
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
