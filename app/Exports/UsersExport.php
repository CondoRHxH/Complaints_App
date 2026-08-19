<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = User::join('professeurs', 'users.professeur_id', '=', 'professeurs.id')
        ->select('professeurs.Nom', 'professeurs.Prenom', 'users.email', 'users.generer_password')
        ->get();

        return $user;
    }


}
