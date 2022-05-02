<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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
}
