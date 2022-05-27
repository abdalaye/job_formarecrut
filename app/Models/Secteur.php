<?php

namespace App\Models;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    use Activable;

    protected $guarded = ['id'];

    public function experiences() 
    {
        return $this->belongsToMany(Experience::class);
    }

    public function offres() 
    {
        return $this->hasMany(Offre::class);
    }
}
