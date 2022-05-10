<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'niveau_competence_id'];


    public function niveau_competence() 
    {
        return $this->belongsTo(NiveauCompetence::class);
    }
}
