<?php

use App\Models\ParentCategory;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('name'); // Nom de la catégorie
            $table->string('slug')->unique(); // Version URL-friendly
            $table->foreignIdFor(ParentCategory::class)->nullable(); // Catégorie parente (pour hiérarchie)
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
