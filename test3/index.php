<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mindconnect";

$connection = new mysqli($servername, $username, $password, $dbname);
$ids = [1,2];

$data = [];

$ids_str = implode(',', $ids);

if (preg_match("~[^0-9\,]+~ui", $ids_str)) exit ('validation error');

$result = $connection->query("SELECT `x`, `y` FROM `values` WHERE `id` IN ($ids_str)");

while ($row = $result->fetch_row()) {
    $data[] = $row;
}

echo '<pre>';
var_dump($data);