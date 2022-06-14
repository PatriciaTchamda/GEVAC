<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Niveau;
use App\Models\Matieres;
use App\Models\Enseignants;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function CreateMatiere()
    {
        $enseignants = Enseignants::all();
        $niveaux = Niveau::all();
        $cycles = Cycle::all();
        return view("pages.Matieres.formMatieres", compact("enseignants", "niveaux","cycles"));
    }

    public function AddMatiere(Request $request)
    {
        $matiere= new Matieres();
        $request->validate([
            "code"=>"required",
            "intitule"=>"required",
            "quota"=>"required",
            "PU"=>"required",
            "semestre"=>"required",
            "enseignants_id"=>"required",
            "niveau_id"=>"required",
            "etat"=> "required"
        ]);

        Matieres::create(
            $request->all()
        );

        return back()->with("success","Matière affectée avec succes!");
    }

    public function ListMatiere()
    {
        $cycles = Cycle::all();
        $matieres = Matieres::orderBy("intitule", "asc")->paginate(10);
        return view("pages.Matieres.listMatieres", compact("matieres","cycles"));
    }

    public function EditMatiere(Matieres $matiere)
    {
        $enseignants = Enseignants::all();
        $niveaux = Niveau::all();
        $cycles = Cycle::all();
        return view("pages.Matieres.editMatieres", compact("matiere","enseignants","niveaux","cycles"));
    }

    public function UpdateMatiere(Request $request, Matieres $matiere)
    {
        $request->validate([
            "code"=>"required",
            "intitule"=>"required",
            "quota"=>"required",
            "PU"=>"required",
            "semestre"=>"required",
            "enseignants_id"=>"required",
            "niveau_id"=>"required"
        ]);

        $matiere->update([
            "code"=>$request->code,
            "intitule"=>$request->intitule,
            "quota"=>$request->quota,
            "PU"=>$request->PU,
            "semestre"=>$request->semestre,
            "enseignants_id"=>$request->enseignants_id,
            "niveau_id"=>$request->niveau_id
        ]);

        return back()->with("successUpdate","Matière mise a jour avec succes!");
    }

    public function DeleteMatiere(Matieres $matiere)
    {
        $matiere->delete();
        return back()->with("succesDelete","Affectation supprimer avec succes!");
    }
}
