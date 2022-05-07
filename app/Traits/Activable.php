<?php 
namespace App\Traits;

use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Builder;

trait Activable {

    public function scopeActive(Builder $query) 
    {
        return $query->where($this->activeColumn(), '1');
    } 

    public function scopeInactive(Builder $query) 
    {
        return $query->where($this->activeColumn(), '0');
    } 

    public function activeColumn(): string 
    {
        return 'statut';
    }

    public function getActiveStateAttribute() 
    {
        if($this->{$this->activeColumn()} == '1') {
            return new HtmlString('<span class="dot dot-success"></span>');
        } 

        return new HtmlString('<span class="dot dot-muted"></span>');
    }

    public function getStatutBadgeAttribute()
    {
        if($this->{$this->activeColumn()} == '1') return '<span class="badge badge-success">Actif</span>';
        return '<span class="badge badge-danger">Inactif</span>';
    }
}