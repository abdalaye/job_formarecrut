<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard.index');
    }

}
