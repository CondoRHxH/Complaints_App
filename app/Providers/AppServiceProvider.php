<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Observers\EtudiantObserver;
use App\Models\User;
use Illuminate\Support\Facades\Event;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Etudiant::observe(EtudiantObserver::class);
        // Event::listen('eloquent.created: ' . Etudiant::class, function ($etudiant) {
        // // Générer l'e-mail
        // $nouvel_email = $etudiant->Nom . $etudiant->N_appose . '@etud.ump.ma';
        // $user = new User;
        // $user->id = $etudiant->id;
        // $user->name = $etudiant-> Nom . ' ' . $etudiant->Prenom ;
        // $user->email = $nouvel_email;
        // $user->password = bcrypt('mot_de_passe_par_defaut');
        // $user->role = 'etudiant';
        // $user->etudiant_id = $etudiant->id;
        // $user->save();
        Event::listen('eloquent.created: ' . Etudiant::class, function ($etudiant) {

            $generer_password = $etudiant->Nom . $etudiant->N_appose . rand(1000,9999);

            $user = new User;
            $user->name = $etudiant->Nom . ' ' . $etudiant->Prenom;
            $user->email = $etudiant->Email;
            $user->password = bcrypt($generer_password);
            $user->role = 'etudiant';
            $user->generer_password = $generer_password;
            $user->etudiant_id = $etudiant->id;
            $user->save();
        });


        Event::listen('eloquent.created: ' . Professeur::class, function ($professeur) {
            
            $generer_password = $professeur->Nom . $professeur->Mat_prof . rand(1000,9999);
            $user = new User;
            $user->name = $professeur->Nom .' '. $professeur->Prenom;
            $user->email = $professeur->Email;
            $user->password = bcrypt($generer_password);
            $user->role = 'professeur';
            $user->generer_password = $generer_password;
            $user->professeur_id = $professeur->id;
            $user->save();
    });
    }

}
