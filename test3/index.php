<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mindconnect";

$connection = new mysqli($servername, $username, $password, $dbname);
$ids = [1,2];

$data = [];
foreach ($ids as $id) {
    $result = $connection->query("SELECT `x`, `y` FROM `values` WHERE `id` = " . $id);
    $data[] = $result->fetch_row();
} 

echo '<pre>';
var_dump($data);