<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class EtudiantExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = User::join('etudiants', 'users.etudiant_id', '=', 'etudiants.id')
        ->select('etudiants.Nom', 'etudiants.Prenom', 'users.email', 'users.generer_password')
        ->get();

        return $user;
    }
}
