<?php 

if(!function_exists('getMonths')) {
    function getMonths() {
        return [
            [ 'name'  => 'Mois', 'value' => '' ],
            [ 'name'  => 'Janvier', 'value' => '01' ],
            [ 'name'  => 'Février', 'value' => '02' ],
            [ 'name'  => 'Mars', 'value' => '03' ],
            [ 'name'  => 'Avril', 'value' => '04' ],
            [ 'name'  => 'Mai', 'value' => '05' ],
            [ 'name'  => 'Juin', 'value' => '06' ],
            [ 'name'  => 'Juillet', 'value' => '07' ],
            [ 'name'  => 'Août', 'value' => '08' ],
            [ 'name'  => 'Septembre', 'value' => '09' ],
            [ 'name'  => 'Octobre', 'value' => '10' ],
            [ 'name'  => 'Novembre', 'value' => '11' ],
            [ 'name'  => 'Décembre', 'value' => '12' ],
        ];
    }

}
if(! function_exists('getMonthByValue')) {
    function getMonthByValue($value) {
        $value = array_filter(\getMonths(), fn($item) => $item['value'] == $value );
        return current($value)['name'];
    }
}