<?php

namespace App\Http\Controllers;

use App\Models\Matieres;
use App\Models\Specialites;
use Illuminate\Http\Request;
use App\Models\Matieres_Specialite;

class MatiereSpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere = Matieres::all();
        $specialite = Specialites::all();
        $liste = Matieres_Specialite::paginate(10);

        return view('pages.MatiereSpecialite.listMatiereSpecialite', compact("matiere", "specialite","liste"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matiere = Matieres::all();
        $specialite = Specialites::all();
        return view('pages.MatiereSpecialite.formMatiereSpecialite',compact("matiere","specialite"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "matieres_id"=>"required",
            "specialite_id"=>"required"
        ]);

        Matieres_Specialite::create($request->all());

        //retourner un message apres l'enregistrement
        return back()->with("success","Affectation d'une matiere a une specialite creer avec succes!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Matieres_Specialite $matiereSpecialite)
    {
        $matiere = Matieres::all();
        $specialite = Specialites::all();
        return view('pages.MatiereSpecialite.editMatiereSpecialite',compact("matiere","specialite","matiereSpecialite"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matieres_Specialite $matiereSpecialite)
    {
        $request->validate([
            "matieres_id"=>"required",
            "specialite_id"=>"required"
        ]);

        $matiereSpecialite->update([
            "matieres_id"=>$request->matieres_id,
            "specialite_id"=>$request->specialite_id
        ]);


        //retourner un message apres l'enregistrement
        return back()->with("success","Mise a jour d'une affectation avec succes!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matieres_Specialite $matiereSpecialite)
    {
        $matiereSpecialite->delete();

        return back()->with("succesDelete","Matiere supprimer avec succes dans une specialite!");
    }
}
