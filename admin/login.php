<?php
session_start();

if ($_SESSION['admin']) {
    header('Location: /admin/index');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <title>Вход в Админ Панель</title>
</head>
<body>

<!-- Форма авторизации -->
<div class="block">
    <form>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit" class="login">Войти</button>
        <p>
            Если Ваш аккаунт не валиден, напишите Гл. Админу
        </p>
        <p class="reaction none">Lorem ipsum dolor sit amet.</p>
    </form>
</div>

<script src="/src/js/jquery-3.6.0.min.js"></script>
<script src="/src/js/account.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
.block {
    font-family: 'Roboto', sans-serif;
    display: flex;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    transition: 200ms ease;
}
    .none {
        display: none;
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
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        justify-content: center;
    }
    input {
        outline: none;
        padding: 10px 15px;
        margin: 5px 0;
        border: 2px solid black;
    }
    label {
        font-size: 26px;
    }
    .login {
        font-family: 'Roboto', sans-serif;
        padding: 10px 35px;
        width: max-content;
        border: 2px solid black;
        background-color: #fff;
        border-radius: 25px;
        font-weight: 500;
        font-size: 18px;
        transition: 350ms ease;
        cursor: pointer;
    }
    .login:hover {
        border-radius: 4px;
    }
    .block p {
        font-size: 32px;
    }
    .reaction {
        font-weight: 500;
    }
</style>

</body>
</html>
