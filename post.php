<?php
session_start();
$postid = $_GET['post_id'];
require 'vendor/database.php';
$query = $mysqli->query("SELECT * FROM `posts` WHERE `id` = '$postid'");
$query = mysqli_fetch_assoc($query);
require 'src/components/header.php';
?>

<div class="view">
    <div class="post">
        <div class="title">
            <?= $query['title'] ?>
        </div>
        <div class="theme">
            <?= $query['theme'] ?>
        </div>
        <div class="text">
            <?= $query['text'] ?>
        </div>
    </div>
</div>


