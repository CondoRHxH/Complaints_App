<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Modul;
use App\Models\Professeur;
use App\Models\Semestre;
use App\Models\Reclamer;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Reclamer $Reclamers)
    {
        $Reclamers = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
            ->join('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
            ->join('notes', 'notes.id', '=', 'reclamers.note_id')
            ->join('modules', 'modules.id', '=', 'notes.module_id')
            ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
            ->where('reclamers.etudiant_id', '=', Auth::user()->etudiant_id)
            ->select(
                'notes.*',
                'modules.*',
                'semestres.Libelle as semestresLibelle',
                'reclamers.*',
                'etudiants.N_appose',
                'professeurs.Nom as professeurnom',
                'professeurs.Prenom as professeurprenom',
                 'etudiants.Nom as etudiantsNom',
                'etudiants.Prenom as etudiantsPrenom',
                )
            ->get();
        $PendingReclamers = $Reclamers->filter(function ($Reclamer) {
            return $Reclamer->status == 3;
        });
        return view('Etudiant.index', compact('PendingReclamers'));
    }



    public function Accepter( Request $request)
    {
        $search = $request->input('search');
        $Reclamers = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
            ->join('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
            ->join('notes', 'notes.id', '=', 'reclamers.note_id')
            ->join('modules', 'modules.id', '=', 'notes.module_id')
            ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
            ->where('reclamers.etudiant_id', '=', Auth::user()->etudiant_id)
            ->select('notes.*', 'modules.*', 'semestres.Libelle as semestresLibelle',
            'reclamers.*', 'etudiants.N_appose', 'professeurs.Nom as professeurnom',
            'professeurs.Prenom as professeurprenom','professeurs.Email as professeurpreEmail', 'etudiants.Nom as etudiantsNom',
            'etudiants.Prenom as etudiantsPrenom',);

            if ($search) {
                $Reclamers->where(function ($query) use ($search) {
                    $query->where("professeurs.Nom", "LIKE", "%{$search}%")
                        ->orWhere("professeurs.Prenom", "LIKE", "%{$search}%");
                });
            }

            $Reclamers->orderBy('reclamers.created_at', 'desc'); // Move orderBy before get()

            $Reclamers = $Reclamers->get();

        $acceptedReclamers = $Reclamers->filter(function ($Reclamer) {
            return $Reclamer->status == 1;
        });
        return view('Etudiant.Accepte', compact('acceptedReclamers'));
    }


    public function Rejecter(Request $request)
    {
        $search = $request->input('search');

        $Reclamers = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
            ->join('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
            ->join('notes', 'notes.id', '=', 'reclamers.note_id')
            ->join('modules', 'modules.id', '=', 'notes.module_id')
            ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
            ->where('reclamers.etudiant_id', '=', Auth::user()->etudiant_id)
            ->select('notes.*', 'modules.*', 'semestres.Libelle as semestresLibelle',
             'reclamers.*', 'etudiants.N_appose', 'professeurs.Nom as professeurnom',
              'professeurs.Prenom as professeurprenom','professeurs.Email as professeurEmail',  'etudiants.Nom as etudiantsNom',
               'etudiants.Prenom as etudiantsPrenom',);

        if ($search) {
            $Reclamers->where(function ($query) use ($search) {
            $query->where("professeurs.Nom", "LIKE", "%{$search}%")
                  ->orWhere("professeurs.Prenom", "LIKE", "%{$search}%");
            });
        }
        $Reclamers->orderBy('reclamers.created_at', 'desc');

        $Reclamer = $Reclamers->get();

        $RejectedReclamers = $Reclamer->filter(function ($Reclamer) {
            return $Reclamer->status == 2;
        });
        return view('Etudiant.Rejecter', compact('RejectedReclamers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Professeurs = Professeur::all();
        $semestres = Semestre::all();
        $Modules = Modul::all();
        $Matieres = Matiere::all();
        $Notes = Note::all();
        return view('Etudiant.create', compact('Professeurs', 'Modules', 'Matieres', 'semestres', 'Notes'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'professeur' => 'required',
            'Module' => 'required',
            'semestre' => 'required',
            'Matiere' => 'required',
            'annee_universitaire' => 'required',
            'remarqueEtudiant' => 'required|max:225',
            // 'N_C_Continu' => ['required', 'regex:/^([0-9]|1[0-9]|20)$/'],
            // 'N_Examen' => ['required', 'regex:/^([0-9]|1[0-9]|20)$/'],
            // 'N_Finale' => ['required', 'regex:/^([0-9]|1[0-9]|20)$/']
        ]);
        $note = new Note();
        // $note->N_C_Continu = $request->input('N_C_Continu');
        // $note->N_Examen = $request->input('N_Examen');
        // $note->N_Finale = $request->input('N_Finale');
        // $note->etudiant_id = auth()->id();
        $note->etudiant_id = auth()->user()->etudiant_id;
        $note->professeur_id = $request->input('professeur');
        $note->module_id = $request->input('Module');
        $note->save();

        $reclamer = new Reclamer();
        $reclamer->remarqueEtudiant = $request->input('remarqueEtudiant');
        $reclamer->annee_universitaire = $request->input('annee_universitaire');
        // $reclamer->etudiant_id = auth()->id();
        $reclamer->etudiant_id = auth()->user()->etudiant_id;
        $reclamer->professeur_id = $request->input('professeur');
        $reclamer->matiere_id = $request->input('Matiere');
        $reclamer->note_id = $note->id;
        $reclamer->save();
        // echo "<pre>";
        // print_r($reclamer->etudiant_id );
        // echo"</pre>";
        // exit();
        Mail::to($reclamer->professeur->Email)->send(new HelloMail($reclamer));
        return redirect()->route('Etudiant.create')->with('message', 'La réclamation a été envoyée.');    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
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
                return view('Etudiant.show', compact('Reclamer'));
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', ['etudiant' => $etudiant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'groupe' => 'required',
            'filiere' => 'required',
            'niveau' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'password' => 'required'
        ]);

        $etudiant->fill($etudiant->post())->save();
        return redirect()->route('etudiants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index');
    }
}
