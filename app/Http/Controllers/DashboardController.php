<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reclamer;
use App\Models\Etudiant;
use App\Models\Professeur;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\PDF;


use function PHPUnit\Framework\isNull;

class DashboardController extends Controller
{
    public function generatePDF($id)
{
    $reclamer = Reclamer::find($id);
        $data = [
        'title' => 'Welcome to',
        'date' => date('m/d/Y'),
        'reclamer' => $reclamer,
        ];
    // dd($data);
    $pdf = PDF::loadView('Admin.test', $data);
    return $pdf->download('Admin-show.pdf');
}

    // public function searchRecla(Request $request)
    // {
    //     if (Auth::user()->role == "admin") {
    //     $request->validate([
    //         'searchR' => 'required',
    //     ]);
    //     $searchR = $request->searchR;
    //     $Reclsea = Reclamer::where(function ($query) use ($searchR) {
    //         $query->Where("Mat_prof", "LIKE", "%{$searchR}%");
    //     })->get();
    //     // return view('admin.index', compact('Reclsea', 'searchR'));
    //     // echo"<pre>";
    //     // print_r("hello");
    //     // echo"</pre>";
    // }}

    public function destroy($id)
    {
        $reclamer = Reclamer::findOrFail($id);
        $reclamer->delete();
        return redirect()->back()->with('success', 'Reclamer deleted successfully');
    }



    public function dashboard(Request $request)
    {
        if (Auth::user()->role == "admin") {
            $accessActive = Cache::get('accessActive');
            $etudiantCount = Etudiant::all();
            $professeurs = Professeur::count();
            $Reclam = Reclamer::all();

            $seaarch = $request->input('seaarch');
            $status = $request->input('status');

            $Reclamers = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
                ->join('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
                ->join('notes', 'notes.id', '=', 'reclamers.note_id')
                ->join('modules', 'modules.id', '=', 'notes.module_id')
                ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
                ->select(
                    'reclamers.id as reclamer_id',
                    'reclamers.created_at as reclamer_created_at',
                    'reclamers.*',
                    'professeurs.*',
                    'etudiants.*',
                    'notes.*',
                    'modules.*',
                    'semestres.*'
                );

            // Apply search if search term is provided
            if ($seaarch) {
                $Reclamers->where(function ($query) use ($seaarch) {
                    $query->where("etudiants.Nom", "LIKE", "%{$seaarch}%")
                        ->orWhere("etudiants.Prenom", "LIKE", "%{$seaarch}%");
                });
            }

            if ($status !== null) {
                $Reclamers->where('reclamers.status', $status);
            }

            $Reclamers->orderBy('reclamers.created_at', 'desc');
            $Reclamers = $Reclamers->paginate(10);

            return view('admin.index', compact('accessActive','Reclamers', 'etudiantCount', 'professeurs', 'Reclam', 'seaarch'));
        } else if (Auth::user()->role == "etudiant") {
            $accessActive = Cache::get('accessActive');
            $etudiantCount = Etudiant::all(); // Assuming 'Etudiant' is your model for students
            $professeurs = Professeur::count();
            $Reclam = Reclamer::all();
            $search = $request->input('search');

            $ReclamersQuery = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
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
                    'etudiants.N_appose as nt',
                    'professeurs.Nom as professeurnom',
                    'professeurs.Prenom as professeurprenom',
                    'professeurs.Email as professeurEmail',
                    'etudiants.Nom as etudiantsNom',
                    'etudiants.Prenom as etudiantsPrenom',
                    'etudiants.Email as eEmail',
                )
                ;

                if ($search) {
                    $ReclamersQuery->where(function ($query) use ($search) {
                        $query->where("professeurs.Nom", "LIKE", "%{$search}%")
                            ->orWhere("professeurs.Prenom", "LIKE", "%{$search}%");
                    });
                }

                $ReclamersQuery->orderBy('reclamers.created_at', 'desc');

                $Reclamers = $ReclamersQuery->get();
        //         echo '<pre>';
        // print_r($Reclamers);
        // echo '</pre>';
        // exit();


            $PendingReclamers = $Reclamers->filter(function ($Reclamer) {
                return $Reclamer->status != 1 || 2;
            });


            return view('Etudiant.index', compact('accessActive','PendingReclamers','search'));
        } else if (Auth::user()->role == "professeur") {
            $accessActive = Cache::get('accessActive');
            $search = $request->input('search');
            $Reclamer = Reclamer::join('professeurs', 'professeurs.id', '=', 'reclamers.professeur_id')
                ->join('etudiants', 'etudiants.id', '=', 'reclamers.etudiant_id')
                ->join('notes', 'notes.id', '=', 'reclamers.note_id')
                ->join('modules', 'modules.id', '=', 'notes.module_id')
                ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
                ->where('reclamers.professeur_id', '=', Auth::user()->professeur_id)
                ->select(
                    'notes.*',
                    'modules.*',
                    'semestres.Libelle as semestresLibelle',
                    'reclamers.*',
                    'etudiants.N_appose as Etu_N',
                    'professeurs.Nom as professeurnom',
                    'professeurs.Prenom as professeurprenom',
                    'etudiants.Nom as etudiantsNom',
                    'etudiants.Prenom as etudiantsPrenom',
                    'etudiants.Email as eEmail',
                );

                if ($search) {
                    $Reclamer->where(function ($query) use ($search) {
                        $query->where("etudiants.Nom", "LIKE", "%{$search}%")
                            ->orWhere("etudiants.Prenom", "LIKE", "%{$search}%");
                    });
                }

                $Reclamer->orderBy('reclamers.created_at', 'desc');
                $Reclamers = $Reclamer->get();

        //         echo '<pre>';
        // print_r($Reclamers);
        // echo '</pre>';
        // exit();

            return view('Professeur.index', compact('accessActive','Reclamers','search'));
        }
        return view('auth.login');
    }
}
