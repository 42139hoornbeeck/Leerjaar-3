<?php

namespace App\Services;

class CalcService {
    public function add($a, $b){
        return $a + $b;
    }

    public function substract($a, $b){
        return $a - $b;
    }
    

    public function multiplication($a, $b){
        return $a * $b;
    }

    public function division($a, $b){
        return $a / $b;
    }

    public function percentage($a, $b){
        return ($a / 100) * $b;
    }

    public function squareRoot($a){
        return sqrt($a);
    }
}