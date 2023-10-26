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
        Schema::create('credit', function (Blueprint $table) {
            $table->id();
            $table->integer('device');
            $table->string('data')->nullable();
            $table->string('price_data')->nullable();
            $table->integer('voice');
            $table->string('price_voice')->nullable();
            $table->integer('offer');
            $table->string('price_offer')->nullable();
            $table->string('option')->nullable();
            $table->string('price_option')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit');
    }
};
