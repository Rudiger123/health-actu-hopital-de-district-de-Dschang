<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_keywords')->nullable();
            $table->text('site_description')->nullable();
            $table->timestamps();
        });

        // Insertion des données de base
        DB::table('site_settings')->insert([
            'site_title' => 'Hôpital Central de Dschang - Média Officiel',
            'site_email' => 'contact@hopitalcentraldschang.cm',
            'site_phone' => '+237 6 99 99 99 99',
            'site_keywords' => 'santé, hôpital, dschang, soins médicaux, informations médicales, cameroun',
            'site_description' => 'Bienvenue sur le portail médiatique officiel de l’Hôpital Central de Dschang. Retrouvez toutes les actualités, événements, et informations médicales destinées au grand public.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
