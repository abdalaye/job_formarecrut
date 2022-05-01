<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class Entreprise extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['logo_url'];


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function abonnement() 
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function getLogoUrlAttribute() 
    {
        return is_null($this->logo) ? asset('img/logo.png') : '';
    }  

    public function logoImg($options = [])
    {
        $options = array_merge([
            'size' => '100px',
            'alt' => '',
            'class' => '',
        ], $options);

        return new HtmlString('<img class="'.$options['class'].'" src="'. $this->logo_url .'" style="width: '. $options['size'] .'">');
    } 

    public function scopeActive($query)
    {
        return $query->where('statut', '1');
    }

    public function scopeInactive($query)
    {
        return $query->where('statut', '0');
    }

    public function getStatusBadgeAttribute() 
    {
        if($this->statut) return new HtmlString('<span class="badge badge-success">Actif</span>');
        
        return new HtmlString('<span class="badge badge-success">Inactif</span>');
    }

    public function trainings() 
    {
        return $this->hasMany(Training::class);
    }

    public function pro_experiences() 
    {
        return $this->hasMany(ProExperience::class);
    }
}
