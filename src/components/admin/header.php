<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: login');
}
require '../vendor/database.php';
$u = $_SESSION['admin']['id'];
$user = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$u' ");
$user = mysqli_fetch_assoc($user);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ Панель | <?= $pagetitle ?></title>
    <link rel="stylesheet" href="/src/css/admin.css">
</head>
<body>

<header class="header">
    <!-- Logo-->
    <div class="header--logo">
        <img src="/src/assets/logo_rw.png" alt="Logo" class="header--img" height="125px">
    </div>
    <!-- Nav-->
    <div class="header--nav">
        <nav>
            <li class="navlinks_admin">
                <a href="#" class="navbtn">На главную</a>
                <a href="#" class="navbtn">Создать пост</a>
                <a href="/admin/posts" class="navbtn">Посты</a>
                <a href="/admin/link" class="navbtn">Аккаунты</a>
                <a href="/admin/index" class="navbtn">Админ-панель</a>
            </li>
        </nav>
    </div>
    <!-- Side-->
    <div class="header--side">
        <p class="badge">
            <?php
            if ($user['level'] == 3) {
                echo 'Гл. Админ';
            } elseif ($user['level'] == 2) {
                echo 'Старший редактор';
            } elseif ($user['level'] == 1) {
                echo 'Редактор';
            } else {
                echo 'Ошибка';
            }
            ?>
        </p> <!-- Статус -->
        <a href="/admin/settings/local" class="account_settings"><?php if ($user['level'] < 3) { echo $user['login']; } ?></a> <!-- Логин -->
        <a href="/vendor/logout" class="logout">Выйти</a> <!-- Выход -->
    </div>