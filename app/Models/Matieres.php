<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matieres extends Model
{
    use HasFactory;
    protected $fillable =["code","intitule","quota","PU","semestre","enseignants_id","niveau_id","etat"];

    public function enseignants()
    {
        return $this->belongsTo(enseignants::class);
    }

    public function niveau()
    {
        return $this->belongsTo(niveau::class);
    }
}
