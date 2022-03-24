<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getPriceTexteAttribute()
    {
        if($this->type == 1) //Mois
            return self::formatCFA($this->price_mensuel) . ' /mois';
        else
            return self::formatCFA($this->price_annuel) . ' /an';
    }

    public function getStatutBadgeAttribute()
    {
        if($this->statut) return '<span class="badge badge-success">Actif</span>';
        return '<span class="badge badge-danger">Inactif</span>';
    }

    static function formatCFA($price) {
        return number_format($price,2,","," ") . ' CFA';
    }
}
