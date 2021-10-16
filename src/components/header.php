<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pagename ?> | RightWings</title>
    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="stylesheet" href="/src/assets/fontawesome_pro/css/all.min.css">
</head>
<body>

<!-- Header -->

<header class="header">
    <div class="header--logo">
        <a href="#" class="logo">
            <img src="/src/assets/logo_rw.png" height="75px" alt="">
        </a>
    </div>
    <div class="header--nav">
        <?php
        if ($_SESSION['admin']) {
            ?>
            <nav>
                <p class="badge">
                    <?php
                    require 'vendor/database.php';
                    $u = $_SESSION['admin']['id'];
                    $user = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$u' ");
                    $user = mysqli_fetch_assoc($user);
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
                </p>
                <li><a href="/admin/index">Username</a></li>
                <li><a href="/">Главная</a></li>
                <li><a href="/api/auth/logout">Выйти</a></li>
            </nav>
            <?php
        } else {
        ?>
        <nav>
            <li><a href="/">Главная</a></li>
        </nav>
        <?php
        }
        ?>
    </div>
    <div class="header--ah">
    </div>
</header>
<!-- -->