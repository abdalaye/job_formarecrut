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
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function CollaborateurByIgg($user,$igg) {
        if($user->igg == $igg){
            return $user;
        }

        return null;
    }

    public function getProfilNameAttribute() {
        if($this->is_admin) {
            return "Administrateur";
        }
        return $this->profil->name ?? "Non défini";
    }

    public function getIsAdminAttribute() {
        return $this->fields['is_admin'] || ($this->profil && $this->profil->id == 3);
    }

    public function getNomCompletAttribute() {
        if(isset($this->collaborateur)) {
            return $this->collaborateur->prenom .' ' . $this->collaborateur->nom;
        }
        return $this->email;
    }
    public function getRoleNotDefinedAttribute(){
        $roles = $this->roles;
        $profil_ids  = [];
        foreach ($roles as $role) {
            array_push($profil_ids, $role->profil_id);
        }
        $profils = Profil::whereNotIn('id',$profil_ids)->get();
        return $profils;
    }
}
