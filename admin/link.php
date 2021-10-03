<?php
session_start();
$pagetitle = 'Аккаунты и Ссылочные Авторизации';
require '../vendor/database.php';
require '../src/components/admin/header.php';
$u = $_SESSION['admin']['id'];
$user = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$u'");
$user = mysqli_fetch_assoc($user);


$u = $_SESSION['admin']['id'];
$user = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$u'");
$user = mysqli_fetch_assoc($user);
if ($user['level'] < 2) { //Проверяем уровень админки
?>
<p class="noPosts">У вас недостаточно прав.</p>

<?php } else { ?>
    <!--    Main-->
    <div class="header--posts">
        <table class="userstable">
            <tr>
                <td>ID</td>
                <td>Логин</td>
                <td>Уровень прав</td>
            </tr>
            <?php
            $users = $mysqli->query("SELECT * FROM `users` WHERE `id` > 1");
            $users = mysqli_fetch_all($users);
            $hashed =  md5($users['login']);
            foreach ($users as $users) { // Начинаем цикл Foreach?>
            <tr>
                <td><?= $users[0] ?></td>
                <td><?= $users[1] ?></td>
                <td><?= $users[3] ?></td>
                <td><a href="accounts?id=<?= $users[0] ?>&hashed=<?= $hashed ?>">Настройки</a></td>
                <td><a href="#">Удалить</a></td>
            </tr>
            <?php }  //Заканчиваем Foreach цикл ?>
        </table>
        <table class="createusers">
            <tr>
                <td>Логин</td>
                <td>Пароль</td>
                <td>Уровень прав</td>
            </tr>
            <tr>
                    <td><input type="text" name="login"></td>
                    <td><input type="text" name="password"></td>
                    <td><input type="text" name="level"></td>
                    <td><a href="#" class="new_account">Создать</a></td>
            </tr>
        </table>
    </div>
</header>
<?php } ?>

<style>
    .header--posts {
        display: grid;
        grid-template-columns: 1fr 3fr;
        grid-template-areas: "userstable createusers";
    }
    .userstable {
        grid-area: userstable;
    }
    .createusers {
        grid-area: createusers;
    }
    .error {
        border: 2px solid red;
        color: red;
    }
    .error:after {
        position: absolute;
        left: 100%;
        content: "Новьё!"; /* Добавляемый текст */
        color: #333; /* Цвет текста */
        background-color: #fc0; /* Цвет фона */
        font-size: 90%; /* Размер шрифта */
        padding: 2px; /* Поля вокруг текста */
    }
</style>
<script src="/src/js/jquery-3.6.0.min.js"></script>
<script src="/src/js/account.js"></script>
</body>
</html>