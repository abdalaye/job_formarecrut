<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation',
        'etablissement',
        'ville',
        'debut_mois',
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
