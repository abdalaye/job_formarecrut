<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauCompetence extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('range', function (Builder $builder) {
            $builder->orderBy('rang');
        });
    }

    public function getStatutBadgeAttribute()
    {
        if($this->statut) return '<span class="badge badge-success">Actif</span>';
        return '<span class="badge badge-danger">Inactif</span>';
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
