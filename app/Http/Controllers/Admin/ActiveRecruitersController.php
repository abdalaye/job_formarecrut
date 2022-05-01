<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveRecruitersController extends Controller
{
    public function index() 
    {
        $recruiters = Entreprise::active()->get();

        return view('admin.active_recruiters.index', compact('recruiters'));
    }

    public function show(Entreprise $entreprise)
    {
        return view('admin.active_recruiters.show', compact('entreprise'));
    }
}
