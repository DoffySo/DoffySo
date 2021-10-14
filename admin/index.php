<?php
$pagetitle = 'Главная';
require '../src/components/admin/header.php';
?>
<!--    Main-->
    <div class="header--posts">
        <?php
        $u = $_SESSION['admin']['id'];
        $user = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$u'");
        $user = mysqli_fetch_assoc($user);
        if ($user['level'] < 2) { //Проверяем уровень админки
            ?>
        <p class="noPosts">У вас недостаточно прав.</p>

        <?php } else {?>
        <?php
            $posts = $mysqli->query("SELECT * FROM `posts` WHERE `accepted` = 0");
            ?>
        <?php if (mysqli_num_rows($posts) > 0) {  // Проверка на имение более чем 0 непроверенных постов?>
            <?php
            $posts = $mysqli->query("SELECT * FROM `posts` WHERE `accepted` = 0");
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
                        <a href="post_check?postid=<?= $post[0] ?>" class="post_btn">Перейти</a>
                        <div class="right_bottom">
                            <small class="admin_sended">ID Админа: <?= $post[4] ?></small>
                            <small class="date">Дата: <?= $post[5] ?></small>
                        </div>
                    </div>
                </div>
        <?php }  //Заканчиваем Foreach цикл ?>

        <?php } elseif (mysqli_num_rows($posts) < 1) { // Если меньше 1 поста ?>
            <p class="noPosts">Непроверенных постов нет.</p>
        <?php } //Заканчиваем проверку?>
<!--            -->
        <?php } // Заканчиваем проверку на уровень?>
    </div>
</header>

</body>
</html>