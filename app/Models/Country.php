<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getStatutBadgeAttribute()
    {
        if($this->statut) return '<span class="badge badge-success">Actif</span>';
        return '<span class="badge badge-danger">Inactif</span>';
    }
}
