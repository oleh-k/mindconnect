<?php

namespace Test2;

class Test2
{

    public function format_number($str) {
        return preg_replace('/[^\d.,]/', '', $str);
    }

    public function sum_digits($int) {
        $int = preg_replace('/[^\d]/', '', $int);

        $digits = str_split($int);
        return array_sum($digits);
    }
}