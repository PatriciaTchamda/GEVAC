<?php

namespace App\Http\Controllers;

use view;
use App\Models\Filieres;
use App\Models\Specialites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class SpecialitesController extends Controller
{
    public function listSpecialites()
    {
        $liste = Specialites::orderBy("intitule", "asc")->paginate(10); //si on ne met pas paginate, on ajoute ->get();
        return view('pages.Specialites.listSpecialite', compact("liste"));
    }

    public function createSpecialites()
    {
        $filiere = Filieres::all();
        return view("pages.Specialites.addSpecialite", compact("filiere"));
    }

    public function AddSpecialites(Request $request)
    {
        $request->validate([
            "code"=>"required",
            "intitule"=>"required",
            "filieres_id"=>"required"
        ]);

        Specialites::create($request->all());

        //retourner un message apres l'enregistrement
        return back()->with("success","Specialite creer avec succes!");
    }

    public function deleteSpecialites(Specialites $specialite)
    {
        $specialite->delete();

        return back()->with("succesDelete","Specialite supprimer avec succes!");
    }

    public function updateSpecialites(Request $request, Specialites $specialite)
    {
        $request->validate([
            "code"=>"required",
            "intitule"=>"required",
            "filieres_id"=>"required"
        ]);

        $specialite->update([
            "code" => $request->code,
            "intitule" => $request->intitule,
            "filieres_id" => $request->filieres_id
        ]);

        //retourner un message apres l'enregistrement
        return back()->with("success","Specialite mis a jour avec succes!");
    }

    public function editSpecialites(Specialites $specialite)
    {
        $filiere = Filieres::all();
        return view("pages.Specialites.editSpecialite", compact("specialite","filiere"));
    }

    public function searchSpecialite(Request $request) {


       return view('pages.Specialites.searchSpecialite', compact('liste'));

  }

}
