<?php

namespace App\Http\Controllers;

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
}
