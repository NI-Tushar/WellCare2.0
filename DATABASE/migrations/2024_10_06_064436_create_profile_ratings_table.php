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
        Schema::create('profile_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('giver_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('taker_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_ratings');
    }
};
