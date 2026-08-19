<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamer extends Model
{
    protected  $fillable = ['id', 'remarqueProf','remarqueEtudiant','photo','annee_universitaire','status', 'etudiant_id', 'professeur_id', 'matiere_id', 'note_id'];
    protected $primaryKey = 'id';

    use HasFactory;
    public function Etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function Professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
    public function Matier()
    {
        return $this->belongsTo(Matiere::class);
    }
    public function Note()
    {
        return $this->belongsTo(Note::class);
    }
}
