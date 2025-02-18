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
        Schema::create('service_offer', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('giver_id')->nullable();
            $table->bigInteger('taker_id')->nullable();
            $table->string('service_title')->nullable();
            $table->string('service')->nullable();
            $table->decimal('budget', 10, 2);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('gender', ['male', 'female', 'others']);
            $table->string('carefor')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_offer');
    }
};
