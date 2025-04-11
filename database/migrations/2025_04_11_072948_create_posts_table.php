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
        // database/migrations/xxxx_xx_xx_create_posts_table.php
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('title'); // Titre de l'article
            $table->string('slug')->unique(); // Version URL-friendly du titre
            $table->text('content'); // Contenu complet de l'article (HTML/markdown)
            $table->text('excerpt')->nullable(); // Résumé court pour les aperçus
            $table->string('featured_image')->nullable(); // Image mise en avant
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft'); // État de publication
            $table->foreignId('author_id')->constrained('users'); // Référence à l'auteur
            $table->timestamp('published_at')->nullable(); // Date de publication
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
