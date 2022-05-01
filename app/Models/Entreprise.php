<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['logo_url'];

    protected $with = ['trainings', 'pro_experiences', 'abonnement', 'owner'];


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function abonnement() 
    {
        return $this->belongsTo(Abonnement::class);
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

    public function getLogoUrlAttribute() 
    {
        return is_null($this->logo) ? asset('img/logo.png') : asset('storage/' .$this->logoDir() . '/' . $this->id . '.' . $this->logo);
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

    public function logoDir()
    {
        return 'recruteurs/logos';
    }

    public function setLogoAttribute($file) 
    {
        if($file->isValid() && $file instanceof UploadedFile) {
            
            self::saved(function($instance) use ($file) {
                $filename = sprintf("%s.%s", $instance->id, $file->getClientOriginalExtension());
                $file->storePubliclyAs(
                    $instance->logoDir(),
                    $filename, 
                    ['disk' => 'public']
                );
            });

            $this->attributes['logo'] = $file->getClientOriginalExtension();
        }
    }
}
