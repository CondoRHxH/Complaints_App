<?php

namespace App\Http\Controllers;

use App\Imports\EtudiantImport;
use App\Imports\ProfesseurImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function show()
    {
        return route('AdEtudiant');
    }

    // public function store(Request $request)
    // {
    // $request->validate([
    //     'file' => 'required|file|mimes:xlsx,xls', // Ajoutez les règles de validation appropriées
    // ]);

    // $file = $request->file('file');
    // (new EtudiantImport)->import($file);

    // return back()->with('success','Le fichier Excel a été importé avec succès.');
    // }
    public function store(Request $request)
    {
        // Check if a file was uploaded
        if (!$request->hasFile('file')) {
            return back()->with('error','Error. Veuillez sélectionner un fichier avec des données.');
        }

        $file = $request->file('file');

        // Import the file
        (new EtudiantImport)->import($file);

        return back()->with('success','Le fichier Excel a été importé avec succès.');
    }


    public function shoow()
    {
        return route('AdProfesseur');
    }

    // public function stoore(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:xlsx,xls',
    //     ]);
    //     $file = $request->file('file');
    //     (new ProfesseurImport)->import($file);
    //     return back()->with('success','Le fichier Excel a été importé avec succès.');
    // }

    public function stoore(Request $request)
{
    // Check if a file was uploaded
    if (!$request->hasFile('file')) {
        return back()->with('error','Error. Veuillez sélectionner un fichier avec des données.');
    }

    $file = $request->file('file');

    // Import the file
    (new ProfesseurImport)->import($file);

    return back()->with('success','Le fichier Excel a été importé avec succès.');
}
}

