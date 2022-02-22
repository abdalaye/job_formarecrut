<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\DashboardController as ControllersDashboardController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends ControllersDashboardController
{
    public function dashboard(){
        return view('admin.dashboard.index');
    }

}
