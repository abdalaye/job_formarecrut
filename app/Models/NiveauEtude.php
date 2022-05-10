<?php

namespace App\Models;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauEtude extends Model
{
    use HasFactory;
    use Activable;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('range', function (Builder $builder) {
            $builder->orderBy('rang');
        });
    }

    protected $guarded = ['id'];

}
