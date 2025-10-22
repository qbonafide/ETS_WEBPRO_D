<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name_rooms');
            $table->foreignId('room_type_id')->constrained('room_types')->onDelete('cascade');
            $table->integer('capacity');
            $table->string('facilities')->nullable();
            $table->decimal('price_per_hour', 10, 2);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
