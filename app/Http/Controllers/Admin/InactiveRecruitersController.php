<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InactiveRecruitersController extends Controller
{
    public function index() 
    {
        $recruiters = Entreprise::inactive()->get();
        return view('admin.inactive_recruiters.index', compact('recruiters'));
    }

    public function show(Entreprise $recruiter) 
    {
        return view('admin.inactive_recruiters.show', compact('recruiter'));
    }
}
