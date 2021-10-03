<?php
session_start();
$pagetitle = 'Посты';
require '../src/components/admin/header.php';
require '../vendor/database.php';
?>

<div class="header--posts">
    <?php
    $posts = $mysqli->query("SELECT * FROM `posts`");
    $posts = mysqli_fetch_all($posts);
    foreach ($posts as $post) { // Начинаем цикл Foreach?>
        <div class="post">
            <div class="head">
                <img src="/src/assets/logo_rw.png" height="200px" width="300px" alt="Img" class="img">
                <small class="theme">Тема: <?= $post[6] ?></small>
            </div>
            <hr>
            <div class="body">
                <div class="top_bottom">
                    <h1 class="title"><?= $post[1] ?></h1>
                    <p class="text"><?= $post[3] ?></p>
                </div>
                <a href="#" class="post_btn">Перейти</a>
                <div class="right_bottom">
                    <small class="admin_sended">ID Админа: <?= $post[4] ?></small>
                    <small class="date">Дата: <?= $post[5] ?></small>
                    <small>Id поста: <?= $post[0] ?></small>
                    <small><a href="/admin/post_change?for=redact&postid=<?= $post[0] ?>" class="redact">Редактировать</a></small>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

