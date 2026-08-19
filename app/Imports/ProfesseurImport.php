<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use App\Models\Professeur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProfesseurImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Professeur([
            'Mat_prof'  => $row['mat_prof'],
            'Nom'       => $row['nom'],
            'Prenom'    => $row['prenom'],
            'Niveau'    => $row['niveau'],
            'Filiere'   => $row['filiere'],
            'Telephone' => $row['telephone'],
            'Email'     => $row['email'],
        ]);
    }
}
