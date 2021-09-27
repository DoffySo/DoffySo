<?php
session_start();
require 'database.php';
$login = $_POST['login'];
$password = $_POST['password'];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($password === '') {
    $error_fields[] = 'password';
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
$logint = md5($login);
$passwordt = md5($password);
$check_user = $mysqli->query( "SELECT * FROM `users` WHERE `login` = '$logint'");
$token = md5(microtime());

if (mysqli_num_rows($check_user) > 0) {
    $mysqli->query("UPDATE `users` SET `token` = '$token' ");
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['admin'] = [
        "id" => $user['id'],
        "token" => $user['token'],
    ];

    $response = [
        "status" => true
    ];

    echo json_encode($response);

} else {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

    echo json_encode($response);
}