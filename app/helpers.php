<?php

use Illuminate\Database\Eloquent\Model;

if(!function_exists('getMonths')) {
    function getMonths() {
        return [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '06' => 'Juin',
            '07' => 'Juillet',
            '08' => 'Août',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre',
        ];
    }
}

if(! function_exists('getYears')) {
    function getYears() {
        $years      = [];
        $startYear  = (int) now()->addYears('-65')->format('Y');
        $finishYear = (int) now()->format('Y');

        for($i = $finishYear; $i >= $startYear; $i--) {
            $years[$i] = $i;
        }

        return $years;
    }
}

if(! function_exists('errorField')) {
    function errorField($errors, $field, $className = 'is-invalid') {
        return $errors->has($field) ? $className : '';
    }
}

if(! function_exists('flatSelect')) {
    function flatSelect($min, $max) {
        return array_reduce(range($min, $max), function($carry, $item) {
            return $carry + [$item => $item];
        }, []);
    }
}

if(! function_exists('keyedSelect')) {
    function keyedSelect($model, $label = 'name', $value = 'id', $options = ['position' => false]) {

        $model = app($model);

        if(! $model instanceof Model) {
            return ['' => "$model is not a model"];
        }

        if($options['position']) {
            $model = $model->orderBy('position');
        }

        $model = $model->pluck($label, $value);

        return $model->all();
    }
}