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
        Schema::create('machine', function (Blueprint $table) {
            $table->id();
            $table->string('nomMachine');
            $table->string('type');
            $table->string('marque');
            $table->string('nomUtilisateur');
            $table->string('departement');
            $table->string('compagnie');
            $table->string('date');
            $table->string('dateLimite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine');
    }
};
