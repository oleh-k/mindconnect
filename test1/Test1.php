<?php

namespace Test1;

class Test1 {

    public static function last_word($sentence) {
        
        if (empty($sentence)) return 0;

        $words = explode(' ', $sentence);
        $lastItem = end($words);
        $len = strlen($lastItem);

        return $len;
    }

    public static function extract_string($str) {
        $res = preg_match('/\[(.*?)\]/', $str, $matches);
        if ($res) {
            return $matches[1];
        } else {
            return "";
        }
    }
}
