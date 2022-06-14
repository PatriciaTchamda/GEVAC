<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialites extends Model
{
    use HasFactory;

    //pour recuperer unique c'est 3 parametre lors de l'envoie de la requete
    protected $fillable = ["code","intitule","filieres_id"];

    public function filieres()
    {
        return $this->belongsTo(filieres::class);
    }
}
