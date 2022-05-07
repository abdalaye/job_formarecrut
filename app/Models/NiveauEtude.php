<?php

namespace App\Models;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauEtude extends Model
{
    use HasFactory;
    use Activable;

    protected $guarded = ['id'];
    
}
