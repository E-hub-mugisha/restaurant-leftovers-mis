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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade');
            $table->string('tx_ref')->unique();         // Transaction reference
            $table->string('transaction_id')->nullable(); // Flutterwave ID
            $table->decimal('amount', 10, 2);           // Payment amount
            $table->string('currency')->default('RWF');
            $table->enum('status', ['pending', 'successful', 'failed'])->default('pending');
            $table->string('payment_type')->nullable(); // e.g., card, mobilemoney
            $table->json('raw_response')->nullable();   // Store full Flutterwave response (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
