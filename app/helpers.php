<?php 

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