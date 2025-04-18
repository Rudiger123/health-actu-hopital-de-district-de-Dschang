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
       // database/migrations/xxxx_xx_xx_create_tags_table.php
Schema::create('tags', function (Blueprint $table) {
    $table->id(); // Identifiant unique
    $table->string('name'); // Nom du tag
    $table->string('slug')->unique(); // Version URL-friendly
    $table->string('color')->default('#3b82f6');
    $table->timestamps(); // created_at et updated_at
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
