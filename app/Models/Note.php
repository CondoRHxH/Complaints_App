<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'notes';

    protected  $fillable = ['N_C_Continu', 'N_Examen', 'N_Finale', 'N_C_Continu_N', 'N_Examen_N', 'N_Finale_N','etudiant_id','professeur_id','module_id'];

    protected $primaryKey = 'id';

    public function reclamations()
    {
        return $this->hasMany(Reclamer::class);
    }
}
