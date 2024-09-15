<?php

class Fibonacci {

    public static function get(int $n) : int {
        
        if ($n <= 0) { // 0 circle
            return 0;
        } elseif ($n == 1) {  // 1 circle
            return 1;
        }
    
        $a = 0;
        $b = 1;
    
        for ($i = 2; $i <= $n; $i++) {  // 2+ circle
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
    
        return $b;
    }
}