<?php
session_start();
$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
$text_small = $_POST['text_small'];
$theme = $_POST['theme'];

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
$date = date("Y-m-d H:i:s");
$mysqli->real_query("INSERT INTO `posts`(`id`, `title`, `text`, `text_small`, `author`, `date`, `theme`, `accepted`, `views`, `comments`, `deleted`) VALUES (NULL,'$title','$text', '$text_small', '$idd' , '$date' ,'$theme', 0, 0, 0, 0)");
$response = [
    "status" => true,
    "message" => "Успех"
];

echo json_encode($response);



