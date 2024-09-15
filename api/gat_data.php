<?php

require_once('../autoloader.php');


# validation

$validation_error = true;

if (isset($_REQUEST['page']) && isset($_REQUEST['per_page'])) {
    $page = $_REQUEST['page'];
    $per_page = $_REQUEST['per_page'];
    
    if (Validator::int($page) && Validator::int(value: $per_page)) {
        $validation_error = false;
    }
}

if ($validation_error == true) {
    $data['success'] = false;
    $data['data'] = 'validation_error';
    echo json_encode($data);
    exit();
}




$db = new DB();

$offset = ($page - 1) * $per_page;
$q = "SELECT `name`, user_input, fibonacci_number 
            FROM fibonacci 
            LIMIT $per_page OFFSET $offset";
$res = $db->query($q);
$rows = $db->fetchAll($res);

$data['success'] = true;
$data['data'] = $rows;
echo json_encode($data);
exit();