<?php
if(isset($_GET['type']) AND isset($_GET['id']) AND isset($_GET['hash']) AND isset($_GET['from']) ) {

    session_start();
    if ($_SESSION['admin']) {
        header('Location: /admin/index');
    }
    $user_id = $_GET['id'];
    require '../../vendor/database.php';
    $query = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$user_id'");
    if (mysqli_num_rows($query) < 1) {
        die('Такого юзера не существует');
    }
    $u = $_GET['from'];
    $query_2 = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$u'");
    $query_2 = mysqli_fetch_assoc($query_2);
    if ($query_2['level'] < 3) {
        die('У администратора, давшего Вам ссылку недостаточно прав.');
    }

    $user = mysqli_fetch_assoc($query);
    $_SESSION['admin'] = [
        "id" => $user['id'],
        "token" => $user['token'],
    ];
    header('Location: /admin/index');
}