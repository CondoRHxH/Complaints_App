<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Models\Reclamer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfesseurController extends Controller
{
    public function index(Professeur $Professeur)
    {
        $Reclamers = Reclamer::leftJoin('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
            ->select('reclamers.*', 'professeurs.Nom', 'professeurs.Prenom')
            ->get();


        return view('Professeur.index', compact('Reclamers'));
    }

    // public function searchRecla(Request $request)
    // {
    //     if (Auth::user()->role == "professeur") {
    //     $request->validate([
    //         'search' => 'required',
    //     ]);
    //     $searchR = $request->search;
    //     $Reclsea = Reclamer::where(function ($query) use ($searchR) {
    //         $query->Where("reclamers.etudiant_id", "LIKE", "%{$searchR}%");
    //     })->get();
    //     return view('Professeur.index', compact('Reclsea', 'searchR'));
    //     // echo"<pre>";
    //     // print_r("hello");
    //     // echo"</pre>";
    // }}

    // public function index(Request $request)
    // {
    //     // Retrieve the search query from the request
    //     $search = $request->query('search');

    //     // Query to retrieve reclamations
    //     $query = Reclamer::leftJoin('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
    //         ->select('reclamers.*', 'professeurs.Nom', 'professeurs.Prenom');

    //     // If search query is provided, filter reclamations
    //     if ($search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('reclamers.etudiant_id', 'LIKE', '%{$search}%');
    //                 // ->orWhere('etudiantsPrenom', 'like', '%' . $search . '%')
    //                 // ->orWhere('etudiantsNom', 'like', '%' . $search . '%');
    //         });
    //     }

    //     // Get the filtered reclamations
    //     $Reclamers = $query->get();

    //     // Pass the reclamations to the view
    //     return view('Professeur.index', compact('Reclamers'));
    // }


    // public function showChangePasswordForm()
    // {
    //     return view('auth.change-password');
    // }

    // public function changePassword(Request $request)
    // {
    //     $request->validate([
    //         'current_password' => 'required',
    //         'password' => 'required|confirmed|min:8',
    //     ]);

    //     $user = Auth::user();

    //     if (!Hash::check($request->current_password, $user->password)) {
    //         return redirect()->back()->with('error', 'Mot de passe actuel incorrect');
    //     }

    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return redirect()->back()->with('success', 'Mot de passe modifié avec succès');
    // }


    public function create()
    {

        return view('Professeur.create');
    }

    // public function Accepter()
    // {
    //     $Reclames = Reclamer::leftJoin('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
    //         ->select('reclamers.*', 'etudiants.Nom as etuNom','etudiants.Email as Nemail', 'etudiants.N_appose as N_etud', 'etudiants.Prenom as etuPrenom')
    //         ->get();

    //     return view('Professeur.Accepte',compact('Reclames'));
    // }


public function Accepter(Request $request)
{
    // Retrieve the search query from the request
    $searchQuery = $request->input('search');

    // Query to fetch reclamations and join with students table
    $ReclamersQuery = Reclamer::leftJoin('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
                ->select('reclamers.*', 'etudiants.Nom as etuNom', 'etudiants.Email as Nemail', 'etudiants.N_appose as N_etud', 'etudiants.Prenom as etuPrenom');

    // Apply search filter if search query is provided
    if ($searchQuery){
    $ReclamersQuery->where(function ($query) use ($searchQuery) {
        $query->where('etudiants.Nom', 'like', '%' . $searchQuery . '%')
              ->orWhere('etudiants.Prenom', 'like', '%' . $searchQuery . '%');
            });
    }

    // Get the filtered reclamations
    // $Reclames = $query->get();
    $ReclamersQuery->orderBy('reclamers.created_at', 'desc');
    $Reclames = $ReclamersQuery->get();

    // Return the view with filtered reclamations
    return view('Professeur.Accepte', compact('Reclames'));
}


    public function Rejecter(Request $request)
    {
        $search = $request->input('search');
        $Reclamers = Reclamer::leftJoin('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
        ->select('reclamers.*', 'etudiants.Nom as etudiNom', 'etudiants.Prenom as etudiPrenom','etudiants.N_appose as N_etudd','etudiants.Email as eEmailt')
        ;

        if ($search) {
            $Reclamers->where(function ($query) use ($search) {
                $query->where("etudiants.Nom", "LIKE", "%{$search}%")
                    ->orWhere("etudiants.Prenom", "LIKE", "%{$search}%");
            });
        }
        $Reclamers->orderBy('reclamers.created_at', 'desc');

        $Reclams = $Reclamers->get();

        return view('Professeur.Rejecter',compact('Reclams'));
    }
    public function editPass()
    {
        return view('Professeur.editPassword');
    }



    public function store(request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
        ]);
        Professeur::create($request->post());
        return redirect()->route('Professeur.index');
    }

    public function show(Professeur $Professeur)
    {
        return view('Professeur.show', ['Professeur' => $Professeur]);
    }

    public function edit($id)
    {
        $Reclamers = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
            ->join('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
            ->join('notes', 'notes.id', '=', 'reclamers.note_id')
            ->join('modules', 'modules.id', '=', 'notes.module_id')
            ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
            ->where('reclamers.professeur_id', '=', Auth::user()->professeur_id)
            ->select('notes.*', 'modules.*', 'semestres.Libelle as semestresLibelle', 'reclamers.*',
             'etudiants.N_appose', 'professeurs.Nom as professeurnom',
              'professeurs.Prenom as professeurprenom', 'etudiants.Nom as etudiantsNom',
               'etudiants.Prenom as etudiantsPrenom',)
            ->get();


        foreach ($Reclamers as $Reclamer) {
            if (
                $Reclamer->id == $id
            ) {
                return view('Professeur.edit', compact('Reclamer'));
            }
        }
    }

    public function update(Reclamer $Reclamer, Request $request)
{
    if ($Reclamer->status == 1 || $Reclamer->status == 2) {
        return redirect()->back()->with('error', 'Reclamation has already been responded to.');
    }
    
    $requestData = $request->validate([
        'status' => 'required|in:2,1',
        "N_C_Continu_N" => 'required',
        "N_Examen_N" => 'required',
        "N_Finale_N" => 'required',
        'N_C_Continu' => ['required', 'regex:/^([0-9]|1[0-9]|20)$/'],
        'N_Examen' => ['required', 'regex:/^([0-9]|1[0-9]|20)$/'],
        'N_Finale' => ['required', 'regex:/^([0-9]|1[0-9]|20)$/'],
        'remarqueProf' => 'required|string',
        'photo' => 'required',
    ]);

    // $requestData = $request->all();

    if ($request->hasFile('photo')) {
        $requestData['photo'] = $request->file('photo')->store('imj', 'public');
    } else {
        return redirect()->back()->with('error', 'Photo is required.');
    }

    $Reclamer->update($requestData);

    if ($Reclamer->status == 2) {
        $Reclamer->note->update([
            'N_C_Continu_N' => null,
            'N_Examen_N' => null,
            'N_Finale_N' => null,
            'N_C_Continu' => $request->input('N_C_Continu'),
            'N_Examen' => $request->input('N_Examen'),
            'N_Finale' => $request->input('N_Finale')
        ]);
    } else {
        $Reclamer->note->update([
            'N_C_Continu_N' => $request->input('N_C_Continu_N'),
            'N_Examen_N' => $request->input('N_Examen_N'),
            'N_Finale_N' => $request->input('N_Finale_N'),
            'N_C_Continu' => $request->input('N_C_Continu'),
            'N_Examen' => $request->input('N_Examen'),
            'N_Finale' => $request->input('N_Finale')
        ]);
    }


    return redirect()->route('dashboard')->with('message', 'Reclamation sent successfully.');
}












    public function destroy(Professeur $Professeur)
    {
        $Professeur->delete($Professeur);

        return redirect()->route('Professeur.index');
    }
}
