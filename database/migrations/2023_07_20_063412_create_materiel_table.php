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
        Schema::create('materiel', function (Blueprint $table) {
            $table->id();
            $table->string('serial')->nullable();
            $table->string('type');
            $table->integer('category');
            $table->string('model')->nullable();
            $table->string('quantity');
            $table->string('date')->nullable();
            $table->string('commente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel');
    }
};
