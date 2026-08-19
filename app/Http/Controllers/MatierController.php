<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\Semestre;
use App\Models\Modul;
use Illuminate\Support\Facades\Cache;
use App\Models\Professeur;

class MatierController extends Controller
{
    public function add()
    {
        $accessActive = Cache::get('accessActive');
        $semestres = Semestre::all();
        $Modules = Modul::all();
        $Professeurs = Professeur::all();
        // print_r($Modules);
        return view('Admin.Matier', compact('Modules', 'semestres','Professeurs','accessActive'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Libelle' => 'required',
            'Code_matiere' => 'required',
            'module_id' => 'required',
            'professeur_id' => 'required',
        ]);

        $Matieres = new Matiere();
        $Matieres->Code_matiere = $request->input('Code_matiere');
        $Matieres->Libelle = $request->input('Libelle');
        $Matieres->module_id = $request->input('module_id');
        $Matieres->professeur_id = $request->input('professeur_id');
        $Matieres->save();

        return redirect()->back();
    }
}
