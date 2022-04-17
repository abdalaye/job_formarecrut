<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function candidat() {
        return $this->hasOne(Candidat::class, 'user_id');
    }

    public function profil() {
        return $this->belongsTo(Profil::class);
    }

    public function getProfilNameAttribute() {
        if($this->is_admin) {
            return "Administrateur";
        }
        return $this->profil->name ?? "Non défini";
    }

    public function getIsAdminProfilAttribute() {
        return $this->is_admin || (isset($this->profil) && $this->profil->id == 3);
    }

    public function getNomCompletAttribute() {
        if(isset($this->candidat)) {
            return $this->candidat->prenom .' ' . $this->candidat->nom;
        }
        return $this->email;
    }

    public function scopeActive($query)
    {
        return $query->where('etat', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('etat', 0);
    }
}
