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
        'date_debut',
        'date_fin',
        'description',
    ];

    protected $appends = ['date_debut', 'date_fin'];

    public function entreprise() 
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function candidat() 
    {
        return $this->belongsTo(Candidat::class);
    }
}