<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const CANDIDAT       = 1;
    
    const RECRUTEUR      = 2;

    const ADMINISTRATEUR = 3;
}
