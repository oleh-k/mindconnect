<?php

require_once('../autoloader.php');


echo 'The quick brown fox: ';
echo Test1\Test1::last_word("The quick brown fox"); 
echo '<br>';
echo '<br>';
echo ': ';
echo Test1\Test1::last_word(""); 


echo '<hr>';
echo 'The quick [brown fox].: ';
echo Test1\Test1::extract_string("The quick [brown fox].");
echo '<br>';
echo '<br>';
echo 'Hello World: ';
echo Test1\Test1::extract_string("Hello World");