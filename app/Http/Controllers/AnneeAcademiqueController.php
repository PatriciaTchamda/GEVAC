<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee_Academique;

class AnneeAcademiqueController extends Controller
{

    public function createAnneeAcademique()
    {
        return view('pages.AnneeAcademique.formAnneeAcademique');
    }

    public function addAnneeAcademique(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "libelle"=>"required",
        ]);

        Annee_Academique::create($request->all());

        //retourner un message apres l'enregistrement
        return back()->with("success","Année Académique créer avec succes!");
    }

    public function listAnneeAcademique()
    {
        $liste = Annee_Academique::orderBy("nom", "asc")->paginate(10);
        return view('pages.AnneeAcademique.listAnneeAcademique', compact("liste"));
    }

    public function editAnneeAcademique(Annee_Academique $annee)
    {
        return view('pages.AnneeAcademique.editAnneeAcademique', compact("annee"));
    }

    public function updateAnneeAcademique(Annee_Academique $annee)
    {
        $request->validate([
            "nom"=>"required",
            "libelle"=>"required",
        ]);

        $annee->update([
            "nom" => $request->nom,
            "intitule" => $request->libelle
        ]);

        //retourner un message apres l'enregistrement
        return back()->with("success","Annee Academique mis a jour avec succes!");
    }

    public function deleteAnneeAcademique(Annee_Academique $annee)
    {
        $annee->delete();

        return back()->with("succesDelete","Specialite supprimer avec succes!");
    }

}
