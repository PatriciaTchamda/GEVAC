<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function listNiveau()
    {
        $liste = Niveau::orderBy("id", "asc")->paginate(10);
        $cycles = Cycle::all();
        return view('pages.Niveau.listNiveau', compact("liste","cycles"));
    }

    public function formNiveau()
    {
        $cycles = Cycle::all();
        return view('pages.Niveau.formNiveau', compact("cycles"));
    }

    public function addNiveau(Request $request)
    {
        $request->validate([
            "numero"=>"required",
            "cycle_id"=>"required"
        ]);

        Niveau::create($request->all());

        //retourner un message apres l'enregistrement
        return back()->with("success","Specialite creer avec succes!");
    }

    public function editNiveau(Niveau $niveau)
    {
        $niveau = Niveau::all();
        return view("pages.Specialites.editSpecialite", compact("specialite","filiere"));
    }

    public function deleteNiveau(Niveau $niveau)
    {
        $niveau->delete();

        return back()->with("succesDelete","Specialite supprimer avec succes!");
    }
}
