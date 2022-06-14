<?php

namespace App\Models;

use App\Models\Matieres;
use App\Models\Specialites;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matieres_Specialite extends Model
{
    use HasFactory;
    protected $fillable = ["matieres_id","specialite_id"];

    public function matieres()
    {
        return $this->belongsTo(Matieres::class);
    }
    public function specialite()
    {
        return $this->belongsTo(Specialites::class);
    }
}
