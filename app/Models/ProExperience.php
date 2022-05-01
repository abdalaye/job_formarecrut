<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'poste',
        'employeur',
        'ville',
        'debut_mois',
        'debut_annee',
        'debut_annee',
        'fin_mois',
        'fin_annee',
        'description',
    ];


    public function entreprise() 
    {
        return $this->belongsTo(Entreprise::class);
    }
}
