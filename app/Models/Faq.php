<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function getAnswerTexteAttribute()
    {
        return strip_tags($this->answer);
    }

    public function getStatutBadgeAttribute()
    {
        if($this->statut) return '<span class="badge badge-success">Actif</span>';
        return '<span class="badge badge-danger">Inactif</span>';
    }

    public function scopeActive($query)
    {
        return $query->where('statut', 1);
    }
}
