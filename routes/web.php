<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\FilieresController;
use App\Http\Controllers\EmargementController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\SpecialitesController;
use App\Http\Controllers\AnneeAcademiqueController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\MatiereSpecialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',[AuthentificationController::class,"dashboard"])->name("dashboard");



Route::get('/login',[AuthentificationController::class,"login"])->name("login");

Route::get('/registration',[AuthentificationController::class,"registration"])->name("registration");

Route::post('/connexion', [AuthentificationController::class,"connexion"])->name("connexion");

Route::post('/authentifier', [AuthentificationController::class,"authentifier"])->name("authentifier");





Route::get('/liste', [SpecialitesController::class, "listSpecialites"])->name("liste");

Route::get('/search', [SpecialitesController::class,"searchSpecialite"])->name('searchSpecialite');

Route::get('/create', [SpecialitesController::class, "CreateSpecialites"])->name("create");

Route::get('/edit/{specialite}',[SpecialitesController::class, "editSpecialites"])->name("editSpecialite");

Route::post('/create', [SpecialitesController::class, "AddSpecialites"])->name("addSpecialite");

Route::delete('/delete/{specialite}', [SpecialitesController::class, "deleteSpecialites"])->name("deleteSpecialite");

Route::put('/update/{specialite}', [SpecialitesController::class, "updateSpecialites"])->name("updateSpecialite");





Route::get('/formEnseignant', [EnseignantController::class, "CreateEnseignant"])->name("FormEnseignant");

Route::post('/addEnseignant', [EnseignantController::class, "AddEnseignant"])->name("AddEnseignant");

Route::get('/listEnseignant', [EnseignantController::class, "ListEnseignant"])->name("ListEnseignant");

Route::get('/editEnseignant/{enseignants}', [EnseignantController::class, "EditEnseignant"])->name("EditEnseignant");

Route::put('/updateEnseignant/{enseignants}', [EnseignantController::class, "UpdateEnseignant"])->name("UpdateEnseignant");

Route::delete('/deleteEnseignant/{enseignants}', [EnseignantController::class, "DeleteEnseignant"])->name("DeleteEnseignant");





Route::get('/formMatiere', [MatiereController::class, "CreateMatiere"])->name("FormMatiere");

Route::post('/addMatiere', [MatiereController::class, "AddMatiere"])->name("AddMatiere");

Route::get('/listMatiere', [MatiereController::class, "ListMatiere"])->name("ListMatiere");

Route::get('/editMatiere/{matiere}', [MatiereController::class, "EditMatiere"])->name("EditMatiere");

Route::put('/updateMatiere/{matiere}', [MatiereController::class, "UpdateMatiere"])->name("UpdateMatiere");

Route::delete('/deleteMatiere/{matiere}', [MatiereController::class, "DeleteMatiere"])->name("DeleteMatiere");





Route::get('/formFiliere', [FilieresController::class, "createFilieres"])->name("FormFilieres");

Route::post('/addFiliere', [FilieresController::class, "addFiliere"])->name("AddFilieres");

Route::get('/listFiliere', [FilieresController::class, "listFilieres"])->name("ListFilieres");

Route::get('/editFiliere/{filiere}', [FilieresController::class, "editFilieres"])->name("EditFilieres");

Route::put('/updateFiliere/{filiere}', [FilieresController::class, "updateFilieres"])->name("UpdateFilieres");

Route::delete('/deleteFiliere/{filiere}', [FilieresController::class, "deleteFilieres"])->name("DeleteFilieres");






Route::get('/formAnneeAcademique', [AnneeAcademiqueController::class, "createAnneeAcademique"])->name("CreateAnneeAcademique");

Route::post('/addAnneeAcademique', [AnneeAcademiqueController::class, "addAnneeAcademique"])->name("AddAnneeAcademique");

Route::get('/listAnneeAcademique', [AnneeAcademiqueController::class, "listAnneeAcademique"])->name("listAnneeAcademique");

Route::get('/editAnneeAcademique/{annee}', [AnneeAcademiqueController::class, "editAnneeAcademique"])->name("editAnneeAcademique");

Route::put('/updateAnneeAcademique/{annee}', [AnneeAcademiqueController::class, "listAnneeAcademique"])->name("updateAnneeAcademique");

Route::delete('/deleteAnneeAcademique/{annee}', [AnneeAcademiqueController::class, "deleteAnneeAcademique"])->name("deleteAnneeAcademique");





Route::get('/formNiveau', [NiveauController::class, "formNiveau"])->name("formNiveau");

Route::post('/addNiveau', [NiveauController::class, "addNiveau"])->name("addNiveau");

Route::get('/listNiveau', [NiveauController::class, "listNiveau"])->name("listNiveau");

// Route::get('/editAnneeAcademique/{annee}', [AnneeAcademiqueController::class, "editAnneeAcademique"])->name("editAnneeAcademique");

// Route::put('/updateAnneeAcademique/{annee}', [AnneeAcademiqueController::class, "listAnneeAcademique"])->name("updateAnneeAcademique");

Route::delete('/deleteNiveau/{niveau}', [NiveauController::class, "deleteNiveau"])->name("deleteNiveau");




Route::get('/formMatiereSpecialite', [MatiereSpecialiteController::class, "create"])->name("CreateMatiereSpecialite");

Route::post('/addMatiereSpecialite', [MatiereSpecialiteController::class, "store"])->name("AddMatiereSpecialite");

Route::get('/listMatiereSpecialite', [MatiereSpecialiteController::class, "index"])->name("ListMatiereSpecialite");

Route::get('/editMatiereSpecialite/{matiereSpecialite}', [MatiereSpecialiteController::class, "edit"])->name("EditMatiereSpecialite");

Route::put('/updateMatiereSpecialite/{matiereSpecialite}', [MatiereSpecialiteController::class, "update"])->name("UpdateMatieresSpecialite");

Route::delete('/deleteMatiereSpecialite/{matiereSpecialite}', [MatiereSpecialiteController::class, "destroy"])->name("DeleteMatiereSpecialite");



Route::get('/emarger', [EmargementController::class, "listEmarger"])->name("listEmarger");

Route::get('/formEmargement/{matieres}', [EmargementController::class, "formEmargement"])->name("formEmargement");

Route::post('/addEmargement', [EmargementController::class, "addEmargement"])->name("addEmargement");

Route::get('/listEmargement', [EmargementController::class, "listEmargement"])->name("listEmargement");

Route::get('/editEmargement/{emargement}', [EmargementController::class, "editEmargement"])->name("editEmargement");

Route::put('/updateEmargement/{emargement}', [EmargementController::class, "updateEmargement"])->name("updateEmargement");
