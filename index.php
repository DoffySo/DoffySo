<?php session_start();
        $pagename = 'Главная';
        require 'src/components/header.php';
        require 'vendor/database.php';
?>
<div class="container">
    <div class="main">
        <div class="ad_one">
            <img src="" alt="Ad" class="image_ad">
            <a href="#" class="go_to_ad">Перейти</a>
        </div>
        <div class="menu">
            <?php
                if ($_SESSION['admin']) {
            ?>
            <a href="#" class="create_post">Создать новость</a>
            <a href="#" class="to_posts">Меню всех постов</a>
            <?php
                }
            ?>
            <!-- -->
            <input type="text" placeholder="Запрещённые наркотики" class="find_">
        </div>
        <div class="posts">
            <?php
            $sql = "SELECT * FROM `posts` WHERE `accepted` = 1";
            $p = $mysqli->query($sql);
            $post = mysqli_fetch_all($p);
            foreach ($post as $poste) {
            ?>
            <div class="post">
                <div class="top">
                    <img src="/src/assets/logo_rw.png" width="250px" alt="Img" class="img">
                    <small class="theme"><?= $poste[6] ?></small>
                </div>
                <div class="bottom">
                    <div class="top_bottom">
                        <h1 class="title"><?= $poste[1] ?></h1>
                        <p class="text"><?= $poste[3] ?></p>
                    </div>
                    <div class="controls">
                        <a href="#" class="post_btn">Подробнее</a>
                        <div class="info">
                            <small class="date"><?= $poste[5] ?></small>
                            <small class="views_comments"><?= $poste[8] ?> просмотров <?= $poste[9] ?> комментариев</small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="ad_two">
            <img src="" alt="Ad" class="image_ad">
            <a href="#" class="go_to_ad">Перейти</a>
        </div>
    </div>
</div>
    <?php include 'src/components/footer.php'; ?>

