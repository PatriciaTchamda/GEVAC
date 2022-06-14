<?php

namespace App\Http\Controllers;

use App\Models\Enseignants;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function CreateEnseignant()
    {
        return view('pages.Enseignants.formEnseignants');
    }

    public function AddEnseignant(Request $request)
    {
        $request->validate([
            "code"=>"required",
            "nom"=>"required",
            "prenom"=>"required",
            "tel"=>"required",
            "email"=>"required",
            "adresse"=>"required"
        ]);

        Enseignants::create($request->all());

        //retourner un message apres l'enregistrement
        return back()->with("success","Enseignant ajouter avec succes!");
    }

    public function ListEnseignant()
    {
        $listes = Enseignants::orderBy("nom", "asc")->paginate(10);
        return view('pages.Enseignants.listEnseignants', compact("listes"));
    }

    public function EditEnseignant(Enseignants $enseignants)
    {
        return view('pages.Enseignants.editEnseignants', compact("enseignants"));
    }

    public function UpdateEnseignant(Request $request, Enseignants $enseignants)
    {
        $request->validate([
            "code"=>"required",
            "nom"=>"required",
            "prenom"=>"required",
            "tel"=>"required",
            "email"=>"required",
            "adresse"=>"required"
        ]);

        $enseignants->update([
            "code"=>$request->code,
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "tel"=>$request->tel,
            "email"=>$request->email,
            "adresse"=>$request->adresse
        ]);

        //retourner un message apres l'enregistrement
        return back()->with("successUpdate","Enseignant mis a jour avec succes!");
    }

    public function DeleteEnseignant(Enseignants $enseignants)
    {
        $enseignants->delete();

        return back()->with("succesDelete","Enseignant supprimer avec succes!");
    }

}
