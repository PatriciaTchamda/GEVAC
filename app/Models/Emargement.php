<?php

namespace App\Models;

use App\Models\Mois;
use App\Models\Matieres;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emargement extends Model
{
    use HasFactory;

    protected $fillable = ["heureDebut","heureFin","nombreHeure","date","matieres_id","mois_id"];

    public function matieres()
    {
        return $this->belongsTo(Matieres::class);
    }
    public function mois()
    {
        return $this->belongsTo(Mois::class);
    }
}
