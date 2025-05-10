<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicine_releases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained('appointments')->onDelete('cascade');
            $table->foreignId('medicine_id')->constrained('medicines')->onDelete('cascade');
            $table->integer('quantity_released');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicine_releases');
    }
};
