<?php

namespace App\Observers;

use App\Models\Etudiant;
use App\Models\User;

class EtudiantObserver
{
    // public function created(Etudiant $etudiant)
    // {
    //     // Avoid creating duplicate users if one already exists with this email
    //     if (User::where('email', $etudiant->Email)->exists()) {
    //         return;
    //     }

    //     User::create([
    //         'name' => $etudiant->Nom . ' ' . $etudiant->Prenom,
    //         'email' => $etudiant->Email,
    //         'password' => bcrypt('mot_de_passe_par_defaut'), // default password, we'll add force-change later
    //         'role' => 'etudiant',
    //         'etudiant_id' => $etudiant->id,
    //     ]);
    // }
}