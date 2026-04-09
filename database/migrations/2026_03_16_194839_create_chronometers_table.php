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
        Schema::create('chronometers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['paused', 'running'])->default('paused');
            $table->enum('direction', ['count_up', 'count_down'])->default('count_up');
            $table->integer('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chronometers');
    }
};
