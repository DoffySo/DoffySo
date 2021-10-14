<?php
session_start();
$postid = $_GET['post_id'];
require 'vendor/database.php';
$query = $mysqli->query("SELECT * FROM `posts` WHERE `id` = '$postid'");
$query = mysqli_fetch_assoc($query);
$pagename = $query['title'];
require 'src/components/header.php';
?>

<div class="container">
    <div class="view">
        <a href="/" class="tohome">Назад</a>
        <div class="post">
            <div class="title">
                <?= $query['title'] ?>
            </div>
            <div class="date">
                <?= $query['date'] ?>
            </div>
            <br>
            <div class="text">
                <?= $query['text'] ?>
            </div>
        </div>
    </div>
</div>


