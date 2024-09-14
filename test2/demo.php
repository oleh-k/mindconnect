<?php

require_once('../autoloader.php');


$test2 = new Test2\Test2();

echo $test2->format_number('"$4,000.15A');

echo '<br>';

echo $test2->sum_digits(-5555);