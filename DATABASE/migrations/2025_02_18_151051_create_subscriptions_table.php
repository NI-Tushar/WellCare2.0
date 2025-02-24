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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('duration')->nullable();
            $table->string('price')->nullable();
            $table->string('orderId')->nullable();
            $table->string('trxnId')->nullable();
            $table->string('pay_status')->nullable();
            $table->string('method')->nullable();
            $table->enum('status', ['enabled', 'disabled'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
