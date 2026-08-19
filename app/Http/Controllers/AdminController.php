<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\semestre;

use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Reclamer;
use App\Models\Note;
use App\Models\Matiere;
use App\Models\Modul;
use App\Exports\UsersExport;
use App\Exports\EtudiantExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use PSpell\Config;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function index()
    {
        $etudiantCount = Etudiant::all(); // Assuming 'Etudiant' is your model for students
        $professeurs = Professeur::all();
        $Reclam = Reclamer::all();
        return view('dashboard', ['etudiantCount' => $etudiantCount, 'professeurs' => $professeurs, 'Reclam' => $Reclam]);
        // echo "<pre>";
        // print_r($etudiantCount->toArray());
        // echo "</pre>";
    }


    // public function sea(Request $request)
    // {
    //     $seaarch = $request->seaarch;
    //     $query = Etudiant::where(function ($query) use ($seaarch) {
    //         $query->where("Nom", "LIKE", "%{$seaarch}%")
    //             ->orWhere("Prenom", "LIKE", "%{$seaarch}%");
    //     })->toSql();
    //     Log::info("Query: " . $query); // Log the SQL query

    //     $Etudiants = Etudiant::query(); // Start with base query

    //     if ($seaarch) { // Check if search term is provided
    //         $Etudiants->where(function ($query) use ($seaarch) {
    //             $query->where("Nom", "LIKE", "%{$seaarch}%")
    //                 ->orWhere("Prenom", "LIKE", "%{$seaarch}%");
    //         });
    //     }

    //     $Etudiants = $Etudiants->paginate(10); // Apply pagination
    //     // return view('sea', compact('Etudiants', 'seaarch'));
    //     dd($Etudiants);
    // }

    public function ExportEtud(){
        return Excel::download(new  EtudiantExport , "Etudiant.xlsx");
    }

    public function Export(){
        return Excel::download(new  UsersExport , "professeur.xlsx");
    }



    public function editPa()
    {
        return view('Admin.editPass');
    }
    public function add()
    {
        $accessActive = Cache::get('accessActive');
        $semestres = Semestre::all();
        $Modules = Modul::all();
        $Matieres = Matiere::all();
        return view('Admin.Add', compact('Modules', 'Matieres', 'semestres','accessActive'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Libelle' => 'required',
            'Code_semestre' => 'required',
        ]);

        $semestre = new Semestre();
        $semestre->Code_semestre = $request->input('Code_semestre');
        $semestre->Libelle = $request->input('Libelle');
        $semestre->save();

        return redirect()->route('Admin.create');
    }

    public function create()
    {
        $accessActive = Cache::get('accessActive');
        $semestres = Semestre::all();
        $Modules = Modul::all();
        $Matieres = Matiere::all();
        return view('Admin.create', compact('Modules', 'Matieres', 'semestres','accessActive'));
    }


    public function storee(Request $request)
    {
        $request->validate([
            'Libelle' => 'required',
            'Code_mod' => 'required',
            'semestre_id' => 'required',
        ]);

        $Moduls = new Modul();
        $Moduls->Code_mod = $request->input('Code_mod');
        $Moduls->Libelle = $request->input('Libelle');
        $Moduls->semestre_id = $request->input('semestre_id');
        $Moduls->save();

        return redirect()->route('Matier');
    }

    public function Etudiant(Request $request)
{
    $search = $request->input('search');
    $accessActive = Cache::get('accessActive');
    $users = User::all();

    // Start building the query
    $query = Etudiant::query();

    // Apply search filters if a search term is provided
    if ($search) {
        $query->where(function ($query) use ($search) {
            $query->where("N_appose", "LIKE", "%{$search}%")
                    ->orWhere("Nom", "LIKE", "%{$search}%")
                    ->orWhere("Prenom", "LIKE", "%{$search}%");
        });
    }
    $Etudiants = $query->paginate(10);

    return view('Admin.Etudiant', ['Etudiants' => $Etudiants,'users' => $users,'accessActive' => $accessActive]);
}

public function Professeur(Request $request)
{
    $search = $request->input('search');
    $accessActive = Cache::get('accessActive');
    $users = User::all();

    // Start building the query
    $query = Professeur::query();

    // Apply search filters if a search term is provided
    if ($search) {
        $query->where(function ($query) use ($search) {
            $query->where("Mat_prof", "LIKE", "%{$search}%")
                ->orWhere("Nom", "LIKE", "%{$search}%")
                ->orWhere("Prenom", "LIKE", "%{$search}%");
        });
    }

    // Paginate the filtered results
    $Professeurs = $query->paginate(10);

    return view('Admin.Professeur', [
        'Professeurs' => $Professeurs,
        'users' => $users,
        'accessActive' => $accessActive
    ]);
}


    public function deleteAll()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->where('role', 'professeur')->delete();
        DB::table('professeurs')->truncate();
        // DB::table('users')->where('id', 1)->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        return redirect()->back()->with('message', 'All professeurs have been deleted successfully.');
    }

    public function show($id)
    {
        $accessActive = Cache::get('accessActive');

        $Reclamers = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
            ->join('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
            ->join('notes', 'notes.id', '=', 'reclamers.note_id')
            ->join('modules', 'modules.id', '=', 'notes.module_id')
            ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
            ->where('reclamers.id', '=', $id)
            ->select('notes.*', 'modules.*', 'semestres.Libelle as semestresLibelle', 'reclamers.*', 'etudiants.N_appose', 'professeurs.Nom as professeurnom', 'professeurs.Prenom as professeurprenom', 'etudiants.Nom as etudiantsNom', 'etudiants.Prenom as etudiantsPrenom')
            ->get();

        // dd($Reclamers);
        foreach ($Reclamers as $Reclamer) {
            if ($Reclamer->id == $id) {
                return view('Admin.show', compact('Reclamer','accessActive'));
            }
        }
    }

    public function toggleMiddleware(Request $request)
    {
        // Récupérer la valeur actuelle de accessActive depuis la session
        $accessActive = $request->session()->get('accessActive', false);
        // Inverser la valeur de accessActive
        $accessActive = !$accessActive;
        Cache::put('accessActive', $accessActive);
        // Enregistrer la nouvelle valeur dans la session
        $request->session()->put('accessActive', $accessActive);

        return redirect()->back();
    }







    public function deleteAllE()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->where('role', 'etudiant')->delete();
        DB::table('etudiants')->truncate();
        // DB::table('users')->where('id', 1)->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        return redirect()->back()->with('message', 'All etudiants have been deleted successfully.');
    }
}
