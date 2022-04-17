<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function niveau_etude()
    {
        return $this->belongsTo(NiveauEtude::class);
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }

    public function getSexeAttribute()
    {
        if($this->genre == 1) return "Homme";
        if($this->genre == 2) return "Femme";
        return "Non renseigné";
    }

    public function getStatutBadgeAttribute()
    {
        if($this->statut) return '<span class="badge badge-success">Complet</span>';
        return '<span class="badge badge-danger">Incomplet</span>';
    }
}
