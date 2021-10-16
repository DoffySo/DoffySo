<?php
session_start();
$id = $_POST['id'];
$postid = $_POST['postid'];
$title = $_POST['title'];
$text = $_POST['text'];
$text_small = $_POST['text_small'];
$theme = $_POST['theme'];

require '../../vendor/database.php';
$query = $mysqli->query("SELECT * FROM `posts` WHERE `id` = '$postid'");

if (mysqli_num_rows($query) < 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => 'Пост с таким ID не найден'
    ];

    echo json_encode($response);

    die();
}
if ($title === '') {
    $error_fields[] = 'title';
}
if ($text === '') {
    $error_fields[] = 'text';
}
if ($text_small === '') {
    $error_fields[] = 'text_small';
}
if ($theme === '') {
    $error_fields[] = 'theme';
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

$mysqli->query("UPDATE `posts` SET `accepted` = '1', `title` = '$title', `text` = '$text', `text_small` = '$text_small', `theme` = '$theme' WHERE `id` = '$postid'");
$response = [
    "status" => true,
    "message" => "Успех"
];

echo json_encode($response);


