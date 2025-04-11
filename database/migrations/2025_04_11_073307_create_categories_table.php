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
        // database/migrations/xxxx_xx_xx_create_categories_table.php
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('name'); // Nom de la catégorie
            $table->string('slug')->unique(); // Version URL-friendly
            $table->foreignId('parent_id')->nullable()->constrained('categories'); // Catégorie parente (pour hiérarchie)
            $table->integer('ordering')->default(1000);
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
