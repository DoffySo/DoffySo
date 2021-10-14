<?php
session_start();
$pagetitle = 'Главная';
require '../src/components/admin/header.php';
require '../vendor/database.php';

$takedid = $_GET['id'];
$hashed = $_GET['hashed'];
$a = $_SESSION['admin']['id'];
$query = $mysqli->query("SELECT * FROM `users` WHERE `id` = $takedid");

if (mysqli_num_rows($query) < 1) {
    echo '<script>alert("Такого аккаунта не найдено.")</script>';
    header('Location: /');
}
$user = mysqli_fetch_assoc($query);
?>

<div class="header--posts">
    <table class="account_setting">
        <tr>
            <td>ID</td>
            <td>Логин</td>
            <td>Уровень прав</td>
            <td>Ссылка для авторизации</td>
        </tr>
        <tr>
            <td><p><input type="text" disabled name="sid" class="idff" style="text-align: center"></td>
            <td><p><input type="text" name="login" value="<?= $user['login'] ?>"> <i class="fal fa-pen"></i></p></td>
            <td><p><input type="text" name="level" value="<?= $user['level'] ?>"> <i class="fal fa-pen"></i></p></td>
            <td><a class="get_link">Получить</a></td>
            <td><a class="setUser">Применить</a></td>
        </tr>
    </table>
    <input type="text" style="display: none; width: 0px; height: 0px;" value="rightwings.net/api/auth/link?type=link&id=<?= $user["id"] ?>&hash=<?= $hashed ?>?&from=<?= $a ?>" class="link">
    <input type="text" style="display: none; width: 0px; height: 0px;" value="?= $hashed ?>" class="hashed">
</div>
</header>
<script src="/src/js/jquery-3.6.0.min.js"></script>
<script src="/src/js/account.js"></script>
<script>
    $('.idff').val(<?= $user['id'] ?>);
    $('.get_link').click(function (e) {
        e.preventDefault();

        var ggg = $('.link')  // Получаем поле
        ggg.select();          // Выбираем поле
        document.execCommand("copy");     // Копируем текст с поля
        document.write("Ссылка: ", ggg.val());

    })

</script>

</body>
</html>
