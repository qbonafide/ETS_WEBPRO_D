<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->timestamp('booked_at')->useCurrent(); 
            $table->date('date_use');
            $table->time('time_slot');
            $table->string('seat_type');
            $table->string('seat_number');
            $table->decimal('price', 10, 2)->default(0);

            $table->string('payment_proof')->nullable();
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
