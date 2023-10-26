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
        if(!Schema::hasTable('personnel')){
            Schema::create('personnel', function (Blueprint $table) {
                $table->id();
                $table->string('lastname');
                $table->string('firstname')->nullable();
                $table->string('email')->nullable();
                $table->string('post');
                $table->integer('department');
                $table->integer('compagny');
                $table->date('resignation_date')->nullable();
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel');
    }
};
