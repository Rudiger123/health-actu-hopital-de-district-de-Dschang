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
    { // database/migrations/xxxx_xx_xx_create_comments_table.php
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Article concerné
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Auteur (si connecté)
            $table->string('author_name')->nullable(); // Pour commentaires anonymes
            $table->string('author_email')->nullable(); // Pour commentaires anonymes
            $table->text('content'); // Texte du commentaire
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // État de modération
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // Réponse à un autre commentaire
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
