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
        Schema::create('reclamers', function (Blueprint $table) {
            $table->id();
            // $table->string('Objet_rec');
            $table->string('remarqueProf')->nullable();
            $table->string('remarqueEtudiant')->nullable();
            $table->string('photo')->nullable();
            // $table->date('Date_rec');
            $table->year('annee_universitaire');
            $table->string('status')->nullable()->default('0');
            $table->foreignId('etudiant_id')->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('professeur_id')->constrained('professeurs')->onDelete('cascade');
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');
            $table->foreignId('note_id')->constrained('notes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamers');
    }
};
