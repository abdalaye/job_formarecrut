<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    use FormAccessible;

    protected $fillable = [
        'poste',
        'employeur',
        'ville',
        'date_debut',
        'date_fin',
        'description',
        'city_id',
        'country_id',
    ];

    public function entreprise() 
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function candidat() 
    {
        return $this->belongsTo(Candidat::class);
    }

    public function country() 
    {
        return $this->belongsTo(Country::class);
    }

    public function city() 
    {
        return $this->belongsTo(City::class);
    }

    public function secteurs() 
    {
        return $this->belongsToMany(Secteur::class);
    }
}