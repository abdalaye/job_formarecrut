<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatInscription;
use App\Http\Requests\EntrepriseInscription;
use App\Models\Candidat;
use App\Models\Entreprise;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        $users = \App\Models\User::where("etat", 1)->get()->all();

        return view('admin.users.index', compact('users'));
    }


    public function show(User $user) {
        return view('admin.users.show', compact('user'));
    }

    public function inscription()
    {
        $candidat = new Candidat();
        $entreprise = new Entreprise();
        $user = new User();

        return view("inscription", compact("candidat", "entreprise", "user"));
    }

    public function inscriptionCandidat(CandidatInscription $request)
    {
        $candidat_data = $request->validated();

        //Generate user access
        $user = $this->generateAccess();

        if($user) {
            $candidat = new Candidat(array_merge($candidat_data, ['user_id' => $user->id]));
            if($candidat->save()) {
                return back()->with(
                    "inscription_success",
                    "Votre inscription a été efféctuée avec succès, veuillez valider votre depuis votre boite email."
                );
            } else $user->delete(); //Suppression utisateur en cas d'echec
        }
        return back()->with(
            "error",
            "Votre inscription n'a pas pu être prise en charge, veuillez réessayer."
        );
    }

    public function inscriptionRecruteur(EntrepriseInscription $request)
    {
        $entrprise_data = $request->validated();

        //Generate user access
        $user = $this->generateAccess(Profil::RECRUTEUR);

        if($user) {
            $entreprise = new Entreprise(array_merge($entrprise_data,
                                        [
                                            'user_id' => $user->id,
                                            'statut' => 0,
                                            'nom' => $entrprise_data['nom_entreprise']
                                        ]));
            if($entreprise->save()) {
                return back()->with(
                    "inscription_success",
                    "Votre inscription a été efféctuée avec succès, veuillez valider votre depuis votre boite email."
                );
            } else $user->delete(); //Suppression utisateur en cas d'echec
        }
        return back()->with(
            "error",
            "Votre inscription n'a pas pu être prise en charge, veuillez réessayer."
        );
    }

    private function generateAccess($profil_id = Profil::CANDIDAT) //1 entrp$entreprise, 2 => entreprise
    {
        $data = $this->validateUserData();

        if($profil_id > 2) {
            throw new \Error("Vous ne pouvez pas créer un compte administrateur depuis la page d'inscritpion");
        }

        //Hash the password
        $data['remember_token'] = md5(time());
        $data['password'] = Hash::make($data['password']);
        $data['profil_id'] = $profil_id;

        $newUser = User::create($data);

        return $newUser->refresh();
    }

    public function validateUserData()
    {
        return request()->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
    }
}
