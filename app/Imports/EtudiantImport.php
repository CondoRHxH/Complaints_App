<?php

namespace App\Imports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // <-- Zid hadi obligatory
use Illuminate\Support\Facades\Hash;

class EtudiantImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Etudiant([
            'N_appose'  => $row['n_appose'],
            'Nom'       => $row['nom'],
            'Prenom'    => $row['prenom'],
            'Niveau'    => $row['niveau'],
            'Filiere'   => $row['filiere'],
            'Groupe'    => $row['groupe'],
            'Telephone' => $row['telephone'],
            'Email'     => $row['email'],
            'password'  => Hash::make('mot_de_passe_par_defaut'), // <-- Default password
            'role'      => 'etudiant',
        ]);
    }
}
