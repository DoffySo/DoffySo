<?php
session_start();
$id = $_POST['sid'];
$login = $_POST['login'];
$lvl = $_POST['level'];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($lvl === '') {
    $error_fields[] = 'level';
}
if ($id === '') {
    $error_fields[] = 'sid';
}
if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}


 require '../../vendor/database.php';
    $sql = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$id'");
    $query = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) < 1) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => $login
        ];

        echo json_encode($response);

        die();
    }

    $query = $mysqli->query("UPDATE `users` SET `login` = '$login', `level` = '$lvl' WHERE `id` = '$id'");
    $response = [
        "status" => true,
        "message" => "Данные успешно изменены"
    ];

    echo json_encode($response);

    if (!$query) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Ошибка изменения данных..."
        ];

        echo json_encode($response);

        die();
    }
