<?php

class Validator
{

    public static function int($value): bool
    {
        if (is_int($value)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateText($value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        if (preg_match('/^[a-zA-Z\s]+$/', $value)) {
            return true;
        }

        return false;
    }
}
