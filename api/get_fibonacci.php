<?php

require_once('../autoloader.php');


# validation

$validation_error = true;

if (isset($_REQUEST['name']) && isset($_REQUEST['user_input'])) {
    $name = $_REQUEST['name'];
    $user_input = $_REQUEST['user_input'];

    if (Validator::int($user_input) && Validator::text($name)) {
        $validation_error = false;
    }
}

if ($validation_error == true) {
    $data['success'] = false;
    $data['data'] = 'validation_error';
    echo json_encode($data);
    exit();
}

