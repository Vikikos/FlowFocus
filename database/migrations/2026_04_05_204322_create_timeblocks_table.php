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
        Schema::create('timeblocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_calendar')->constrained('calendars')->onDelete('cascade');
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');  
            $table->string('color')->default('#6e7ed8'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeblocks');
    }
};
