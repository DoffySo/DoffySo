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
        <a href="/" class="tohome"> <p>Домой</p> <i class="fas fa-chevron-right"></i> <p><?= $query['theme'] ?></p></a>
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
        <hr>
        <div class="comments">
            Комментарии
            <div class="leave_comment">
                <input type="text" placeholder="Имя">
                <input type="text" placeholder="Текст">
                <button type="submit">Оставить комментарий</button>
            </div>
            <br>
            <?php
                $sql = "SELECT * FROM `comments` WHERE `postid` = '$postid'";
                $query = $mysqli->query($sql);
                if (mysqli_num_rows($query) < 1) {
                    echo 'Комментариев нет, оставьте его первым!';
                }
                $query = mysqli_fetch_all($query);

                foreach ($query as $comment) {
            ?>
                    <div class="comment">
                        <h2><?= $comment[1] ?></h2>
                        <p><?= $comment[2] ?></p>
                        <small><?= $comment[3] ?></small>
                        <small class="commentid">#<?= $comment[4] ?></small>
                    </div>
            <?php } ?>
        </div>
    </div>
</div>


