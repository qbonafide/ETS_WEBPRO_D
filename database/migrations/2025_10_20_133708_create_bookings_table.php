<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->string('desk_number', 10)->nullable(); 
            $table->string('booking_code', 50)->unique();

            $table->date('booking_date');
            $table->time('start_time'); 
            $table->time('end_time');
            $table->text('booked_slots');

            $table->integer('total_hours');
            $table->decimal('total_price', 10, 2);

            $table->enum('status', ['pending', 'confirmed'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
