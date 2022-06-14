<?php

namespace App\Http\Controllers;

use App\Models\Mois;
use App\Models\Cycle;
use App\Models\Niveau;
use App\Models\Matieres;
use App\Models\Emargement;
use App\Models\Enseignants;
use App\Models\Specialites;
use Illuminate\Http\Request;
use App\Models\Matieres_Specialite;

class EmargementController extends Controller
{
    public static $total = 0;

    public function listEmarger()
    {
        $matieres = Matieres::where("etat", "execution")->orderBy("niveau_id", "asc")->orderBy("semestre", "asc")->paginate(10);
        $enseignants = Enseignants::all();
        $matiereSpecialites = Matieres_Specialite::all();
        $mois = Mois::all();
        $niveau = Niveau::all();
        $cycles = Cycle::all();
        $specialites = Specialites::all();

        return view('pages.Emargement.emarger',compact("matieres","matiereSpecialites","niveau","enseignants","cycles","specialites"));
    }

    public function formEmargement(Matieres $matieres)
    {
        return view('pages.Emargement.formEmargement',compact("matieres"));
    }

    public function addEmargement()
    {
        //recuperation des elements du formulaires
        $today = date('y-m-d');
        $mois = date('m');
        $matiere = $_POST['matiere'];
        $heurefin =$_POST["heurefin"];
        $heuredeb = $_POST['heuredeb'];

        //convertion des heures pour effectuer le calcul
        $fin = strtotime($_POST['heurefin']); //convertir le type en nombre pouvat etre calculer
        $debut = strtotime($_POST['heuredeb']); //autre methode $debut=new \DateTime("{$heuredeb}:00")
        $diff = $fin - $debut; // avec la methode datetime on fera $restant = $debut->diff($fin)
        $nombreHeure = date('H:i',$diff); //convertion en time $heureRestant = $diff->format('%H:%I:%S');

        $emargement = new Emargement();

        $emargement->heureDebut = $heuredeb;
        $emargement->heureFin = $heurefin;
        $emargement->nombreHeure = $nombreHeure;
        $emargement->date = $today;
        $emargement->mois_id = $mois;
        $emargement->matieres_id = $matiere;

        $emargement->save();

        //gestion des heures restantes

        $matieres = Matieres::find($matiere);
        $intitule = $matieres->intitule;
        $emarger = Emargement::all()->where("matieres_id", $matiere);
        $quota = $matieres->quota;

        if ($emarger) {
            for ($i=1; $i < count($emarger); $i++) {
                $heure = $emarger[$i]->nombreHeure;
                static::$total = static::$total + strtotime($heure);
            }
        }

        if (intval(date('H',static::$total)) == $quota) {

            $matieres->etat = "Termine";
            $matieres->save();
            return back()->with("Termine","Unite d'enseignement: $intitule terminee!!");
        }else {
            return back()->with("success","Emargement effectue avec succes!");
        }

    }

    public function listEmargement()
    {
        $matieres = Matieres::where("etat", "execution")->orderBy("niveau_id", "asc")->orderBy("semestre", "asc")->paginate(10);
        $enseignants = Enseignants::all();
        $emarger = Emargement::all();
        $niveau = Niveau::all();
        $cycles = Cycle::all();

        return view('pages.Emargement.listEmargement',compact("matieres","niveau","enseignants","cycles","emarger"));
    }

    public function editEmargement(Emargement $emargement)
    {
        return view('pages.Emargement.editEmargement',compact("emargement"));
    }

    public function updateEmargement(Request $request, Emargement $emargement)
    {
        $restant = $emargement->nombreHeure;
        //static::$total = static::$total - strtotime($restant);

        //recuperation des elements du formulaires
        $heurefin =$_POST["heurefin"];
        $heuredeb = $_POST['heuredeb'];

        //convertion des heures pour effectuer le calcul
        $fin = strtotime($_POST['heurefin']); //convertir le type en nombre pouvat etre calculer
        $debut = strtotime($_POST['heuredeb']); //autre methode $debut=new \DateTime("{$heuredeb}:00")
        $diff = $fin - $debut; // avec la methode datetime on fera $restant = $debut->diff($fin)
        $nombreHeure = date('H:i',$diff); //convertion en time $heureRestant = $diff->format('%H:%I:%S');

        $emargement->update([
            "heureDebut" => $request->heuredeb,
            "heureFin" => $request->heurefin,
            "nombreHeure" => $nombreHeure,
        ]);

        //gestion des heures restantes
        $matiere = $emargement->matieres_id;
        $matieres = Matieres::find($matiere);
        $quota = $matieres->quota;
        if ($nombreHeure < $restant) {
            if ($matieres->etat = "Termine" ){
                $matieres->etat = "execution";
                $matieres->save();
            }
            return back()->with("success","Emargement modifier avec succes!");
        }elseif ($nombreHeure > $restant) {
            if ($matieres->etat = "execution" ){
                $emarger = Emargement::all()->where("matieres_id", $matiere);
                if ($emarger) {
                    for ($i=1; $i < count($emarger); $i++) {
                        $heure = $emarger[$i]->nombreHeure;
                        static::$total = static::$total + strtotime($heure);
                    }
                }
            }
            if (intval(date('H',static::$total)) == $quota) {
                $matieres->etat = "Termine";
                $matieres->save();
                return back()->with("Termine","Unite d'enseignement: $matieres->intitule terminee!!");
            }else {
                return back()->with("success","Emargement modifier avec succes!");
            }

        }else{
            return back()->with("success","Emargement modifier avec succes!");
        }

    }
}
