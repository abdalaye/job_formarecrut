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

    protected $appends = ['date_debut', 'date_fin'];


    public function entreprise() 
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function getDateDebutAttribute() 
    {
        return sprintf("%s %s", \getMonthByValue($this->debut_mois), $this->debut_annee);
    }

    public function getDateFinAttribute() 
    {
        return sprintf("%s %s", \getMonthByValue($this->fin_mois), $this->fin_annee);
    }
}
