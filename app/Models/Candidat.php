<?php

namespace App\Models;

use App\Traits\Activable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidat extends Model
{
    use HasFactory;
    use Activable;

    protected $guarded = ['id'];

    protected $with = [
        'user', 
        'country', 
        'city', 
        'niveau_etude', 
        'situation', 
        'formations', 
        'experiences'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function niveau_etude()
    {
        return $this->belongsTo(NiveauEtude::class);
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }

    public function formations() 
    {
        return $this->hasMany(Formation::class);
    }

    public function experiences() 
    {
        return $this->hasMany(Experience::class);
    }

    public function competences() 
    {
        return $this->hasMany(Competence::class);
    }

    public function getSexeAttribute()
    {
        if($this->genre == 1) return "Homme";
        if($this->genre == 2) return "Femme";
        return "Non renseigné";
    }

    public function getNomCompletAttribute() 
    {
        return sprintf("%s %s", $this->prenom, strtoupper($this->nom));
    }

    public function getPhotoUrlAttribute() 
    {
        if(is_null($this->logo)) {
            return asset('img/photo.png');
        }

        return asset('storage/' . $this->photoDir() . '/' . $this->id . '.' . $this->photo);
    }  

    public function photoImg($options = [])
    {
        $options = array_merge([
            'size' => '100px',
            'alt' => '',
            'title' => '',
            'class' => '',
        ], $options);

        return new HtmlString('<img title="'.$options['title'].'" alt="'.$options['alt'].'" class="'.$options['class'].'" src="'. $this->photo_url .'" style="width: '. $options['size'] .'">');
    } 

    public function photoDir()
    {
        return 'candidats/photos';
    }

    public function setPhotoAttribute($file) 
    {
        if($file instanceof UploadedFile) {
            
            self::saved(function($instance) use ($file) {
                $filename = sprintf("%s.%s", $instance->id, $file->getClientOriginalExtension());
                $file->storePubliclyAs($instance->photoDir(), $filename);
            });

            $this->attributes['photo'] = $file->getClientOriginalExtension();
        }
    }
}
