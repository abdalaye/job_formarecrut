<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function entreprise() 
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function secteur() 
    {
        return $this->belongsTo(Secteur::class);
    }

    public function isExpired() 
    {
        return \carbon($this->expires_at)->isPast();
    }

    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<', now());
    }
}
