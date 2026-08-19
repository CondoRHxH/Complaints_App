<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    protected  $fillable = ['etudiant_id','professeur_id','matiere_id','Objet_rec','Remarque','Date_rec','annee_universitaire'];

    use HasFactory;
    public function Etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    public function Professeur()
    {
        return $this->belongsTo(Professeur::class, 'professeur_id');
    }
}
