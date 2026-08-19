<?php

use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatierController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AdminController;
use App\Mail\HelloMail;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\PDFController;
use App\Models\Administration;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/error', function () {
    return view('error');
})->name('Error');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/admin/toggle-middleware', [AdminController::class, 'toggleMiddleware'])->name('admin.toggle.middleware');


// Route::get('/sea', [DashboardController::class, 'dashboard'])->middleware(['auth', 'check.role:admin'])->name('sea');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified', 'checkAdminRole'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//----Admin-------
Route::resource('Admin', AdminController::class)->middleware(['auth', 'check.role:admin']);
// Route::get('/Module', [MatierController::class, 'add'])->middleware(['auth', 'check.role:admin']);

// searchReclamation
Route::get('/searchRecla', [DashboardController::class, 'searchRecla'])->middleware(['auth', 'check.role:admin'])->name('searchRecla');


Route::post('Admin/create', [AdminController::class, 'storee'])->name('Admin/create')->middleware(['auth', 'check.role:admin']);

Route::get('/editPass', [AdminController::class, 'editPa'])->middleware(['auth', 'check.role:admin'])->name('editPass');

Route::match(["get","post"],'/export.Professeur', [AdminController::class, 'Export'])->middleware(['auth', 'check.role:admin'])->name('export');
Route::match(["get","post"],'/export.Etudiant', [AdminController::class, 'ExportEtud'])->middleware(['auth', 'check.role:admin'])->name('ExportEtud');

Route::get('/generatePDF/{id}', [DashboardController::class, 'generatePDF'])->name('generatePDF');

// ------------------------

// Route::get('/Add', function () {
//     $accessActive = true;
//     return view('Admin.Add',compact('accessActive'));
// })->middleware(['auth', 'check.role:admin'])->name('Add');
Route::get('/Add', [AdminController::class, 'add'])->middleware(['auth', 'check.role:admin'])->name('Add');



Route::get('/Matier', [MatierController::class, 'add'])->middleware(['auth', 'check.role:admin'])->name('Matier');
Route::post('Matier/store', [MatierController::class, 'store'])->middleware(['auth', 'check.role:admin'])->name('Matier/store');

// ----------------------------

Route::get('/AdEtudiant', [AdminController::class, 'Etudiant'])->middleware(['auth', 'check.role:admin'])->name('AdEtudiant');
Route::get('/AdProfesseur', [AdminController::class, 'Professeur'])->middleware(['auth', 'check.role:admin'])->name('AdProfesseur');
// Route::get('/AdAccepter', [AdminController::class, 'Accepter'])->middleware(['auth', 'check.role:admin'])->name('AdAccepter');
// Route::get('/AdRejecter', [AdminController::class, 'Rejecter'])->middleware(['auth', 'check.role:admin'])->name('AdRejecter');

Route::get('/search', [AdminController::class, 'search'])->middleware(['auth', 'check.role:admin'])->name('search');
Route::get('/seaarch', [AdminController::class, 'seaarch'])->middleware(['auth', 'check.role:admin'])->name('seaarch');

Route::delete('/delete-all', [AdminController::class, 'deleteAll'])->name('delete.all');
Route::delete('/delete-allE', [AdminController::class, 'deleteAllE'])->name('delete.allE');





//----Excel--Admin/Etudiant
Route::get('/AdEtudd', [ImportController::class, 'show'])->name('AdEtudd');
Route::post('/AdEtud', [ImportController::class, 'store'])->name('AdEtud');


//----Excel--Admin/Professeur
Route::get('/AdProff', [ImportController::class, 'shoow'])->name('AdProff');
Route::post('/AdProf', [ImportController::class, 'stoore'])->name('AdProf');


// Route::get('Professeur', function () {
//     return view('Professeur.index');
// })->name('Professeur');

// Route::get('Etudiant', function () {
//     return view('Etudiant.index');
// })->name('Etudiant');



//-----Etudiant --------------
Route::resource('Etudiant', EtudiantController::class)->middleware(['auth', 'check.role:etudiant']);
Route::get('Etudiant/{id}/show', [EtudiantController::class, 'show'])->middleware(['auth', 'check.role:etudiant'])->name('Etudiant');
Route::delete('/delete/{id}', [DashboardController::class, 'destroy'])->name('delete');


Route::get('/enRecla', [EtudiantController::class, 'create'])->middleware(['auth', 'check.role:etudiant'])->name('enRecla');
// Route::get('/AdProfesseur', [EtudiantController::class, 'Professeur'])->middleware(['auth', 'check.role:etudiant'])->name('AdProfesseur');
Route::get('/Acce', [EtudiantController::class, 'Accepter'])->middleware(['auth', 'check.role:etudiant'])->name('Acce');
Route::get('/Rejec', [EtudiantController::class, 'Rejecter'])->middleware(['auth', 'check.role:etudiant'])->name('Rejec');
Route::get('/voirr', [EtudiantController::class, 'show'])->middleware(['auth', 'check.role:etudiant'])->name('voirr');
// Route::get('/create', [EtudiantController::class, 'create'])->middleware(['auth', 'check.role:etudiant'])->name('create');
// Route::post('/store', [EtudiantController::class, 'store'])->middleware(['auth', 'check.role:etudiant'])->name('store');


// ------Email-------
// route::get('/send-mail', function () {
//     Mail::to('condorhxh04@gmail.com')
//         ->send(new HelloMail());
//     return redirect()->route('Etudiant.create');
// })->name('sendmail');

// Route::get('/send-mail', function () {
//     $siteUrl = 'https://localhost/route/Professeur.index';
//     Mail::to('condorhxh04@gmail.com')->send(new HelloMail($siteUrl));
//     return redirect()->route('Etudiant.create');
// })->name('sendmail');
Route::get('/send-mail', [HelloMail::class, 'sendMail'])->name('sendmail');


//-----Professeur --------------
Route::resource('Professeur', ProfesseurController::class)->middleware(['auth', 'check.role:professeur']);

Route::get('professeur/{id}/edit', [ProfesseurController::class, 'edit'])->middleware(['auth', 'check.role:professeur'])->name('professeur.edit');
// Route::get('professeur/{Professeur}/show', [ProfesseurController::class, 'show'])->middleware(['auth', 'check.role:professeur'])->name('Professeur.show');

Route::put('/professeur/{Reclamer}', [ProfesseurController::class, 'update'])->name('professeur.update');

Route::get('/enReclaa', [ProfesseurController::class, 'create'])->middleware(['auth', 'check.role:professeur'])->name('enReclaa');
// Route::get('/AdProfesseur', [ProfesseurController::class, 'Professeur'])->middleware(['auth', 'check.role:professeur'])->name('AdProfesseur');
Route::get('/Accepter', [ProfesseurController::class, 'Accepter'])->middleware(['auth', 'check.role:professeur'])->name('Accepter');
Route::get('/Rejecter', [ProfesseurController::class, 'Rejecter'])->middleware(['auth', 'check.role:professeur'])->name('Rejecter');
Route::get('/editPassword', [ProfesseurController::class, 'editPass'])->middleware(['auth', 'check.role:professeur'])->name('editPassword');
Route::get('/change-password', [ProfesseurController::class, 'showChangePasswordForm'])->name('password.change');
// Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('password.update');
Route::put('/password', [ProfesseurController::class, 'changePassword'])->name('password.update');


















//------------------------------------------------


// Route::resource('/Admin', AdministrateurController::class)
// ->middleware(['auth', 'check.role:admin']); // mat9ishache lahheir7em lawalidin

// Route::get('/AdEtudiant', [AdEtudiantController::class, 'index'])->middleware(['auth', 'check.role:admin'])->name('AdEtudiant');
// Route::get('/AdProfesseur', function () {
//     return view('Admin.Professeur');
// })->middleware(['auth', 'check.role:admin'])->name('AdProfesseur');
// Route::resource('/Etudiant', EtudiantController::class)
// ->middleware(['auth', 'check.role:etudiant']);// mat9ishache lahheir7em lawalidin

// Route::resource('/Professeur', ProfesseurController::class)
// ->middleware(['auth', 'check.role:professeur']);// mat9ishache lahheir7em lawalidin

// Route::get('/login', function () {
//     return view('login');
// })->name('login'); // mat9ishache lahheir7em lawalidin

// // routes/web.php
// Route::middleware(['auth'])->group(function () {
//     Route::get('/redirect-home', function () {

//         $role = Auth::user()->role;

//         switch ($role) {
//             case 'admin':
//                 return redirect('/Admin');
//                 break;
//             case 'etudiant':
//                 return redirect('/Etudiant');
//                 break;
//             case 'professeur':
//                 return redirect('/Professeur');
//                 break;
//         }
//     })->name('redirect.home');
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
















// Route::get('admin/Etudiant', function () {
//     return view('admin.Etudiant');});






// Route::middleware(['auth','check.role:fonctionnaire'])->group(function () {
// Route::resource('seance', SeanceController::class);
// Route::get('/seance', [SeanceController::class, 'index'])->name('seance.index');
// Route::get('/seance/{seance}', [SeanceController::class, 'edit'])->name('seance.edit');
// Route::patch('/seance', [SeanceController::class, 'update'])->name('seance.update');
// Route::delete('/seance', [SeanceController::class, 'destroy'])->name('seance.destroy');
// });

require __DIR__ . '/auth.php';
