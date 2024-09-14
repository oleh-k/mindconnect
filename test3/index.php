<?php


$data = [];
foreach ($ids as $id) {
    $result = $connection->query("SELECT `x, `y` FROM `values` WHERE `id` = " . $id);
    $data[] = $result->fetch_row();
}