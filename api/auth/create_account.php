<?php
session_start();
require '../../vendor/database.php';
$login = $_POST['login'];
$password = $_POST['password'];
$level = $_POST['level'];

if ($login == '') {
    $error_fields[] = 'login';
    $response = [
        "status" => false,
        "message" => 'Пустой логин!'
    ];
}
if ($password == '') {
    $error_fields[] = 'password';
    $response = [
        "status" => false,
        "message" => 'Пустой пароль!'
    ];
}
if ($level == '') {
    $error_fields[] = 'level';
    $response = [
        "status" => false,
        "message" => 'Пустой уровень прав!'
    ];
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

$userf = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'");
if (mysqli_num_rows($userf) > 0) {
    $userf = mysqli_fetch_assoc($userf);
    if ($login == $userf['login']) {
        $error_fields[] = 'login';
    }
    $response = [
        "status" => false,
        "type" => 1,
        "fields" => $error_fields,
        "message" => 'Такой аккаунт уже существует!'
    ];

    echo json_encode($response);
} else {
    $password = md5($password);

    $mysqli->real_query("INSERT INTO `users`(`id`, `login`, `password`, `level`, `token`) VALUES (NULL, '$login', '$password', '$level', '')");
            $response = [
                "status" => true
            ];

    echo json_encode($response);
}