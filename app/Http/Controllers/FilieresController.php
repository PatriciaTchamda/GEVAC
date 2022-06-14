<?php

namespace App\Http\Controllers;

use App\Models\Filieres;
use Illuminate\Http\Request;

class FilieresController extends Controller
{
    public function listFilieres()
    {
        $liste = Filieres::orderBy("intitule","asc")->paginate(10);
        return view('pages.Filieres.listFilieres',compact("liste"));
    }

    public function createFilieres()
    {
        return view("pages.Filieres.formFilieres");
    }

    public function addFiliere(Request $request)
    {
        $request->validate([
            "code"=>"required",
            "intitule"=>"required",
        ]);

        Filieres::create($request->all());

        //retourner un message apres l'enregistrement
        return back()->with("success","Filiere creer avec succes!");
    }

    public function editFilieres(Filieres $filiere)
    {
        return view('pages.Filieres.editFilieres',compact("filiere"));
    }

    public function updateFilieres(Request $request, Filieres $filiere)
    {
        $request->validate([
            "code"=>"required",
            "intitule"=>"required"
        ]);

        $filiere->update([
            "code" => $request->code,
            "intitule" => $request->intitule
        ]);

        //retourner un message apres l'enregistrement
        return back()->with("success","Filiere mis a jour avec succes!");
    }

    public function deleteFilieres(Filieres $filiere)
    {
        $filiere->delete();

        return back()->with("succesDelete","Filiere supprimer avec succes!");
    }
}
