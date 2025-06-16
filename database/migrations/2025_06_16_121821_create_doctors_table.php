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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialty')->nullable(); // Ex: Cardiologie, Pédiatrie
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->text('bio')->nullable(); // Petite biographie du docteur
            $table->string('profile_picture')->nullable(); // Chemin de l'image de profil
            $table->boolean('is_active')->default(true); // Pour activer/désactiver le docteur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};