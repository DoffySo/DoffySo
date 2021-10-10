<?php
session_start();
$id = $_POST['id'];

require '../../vendor/database.php';
$query = $mysqli->query("SELECT * FROM `posts` WHERE `id` = 1");

if (mysqli_num_rows($query) < 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => 'Пост с таким ID не найден'
    ];

    echo json_encode($response);

    die();
}
if ($id === '') {
    $error_fields[] = 'id';
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
$query = mysqli_fetch_assoc($query);



$userid = $mysqli->real_escape_string($_POST["id"]);
$sql = "UPDATE `posts` SET `deleted`= 1 WHERE `id` = '$userid'";

if ($mysqli->query($sql)) {

    $response = [
        "status" => true,
        "message" => "Успех"
    ];


    echo json_encode($response);
}



