<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;

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
}
