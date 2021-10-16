<?php
require '../src/components/admin/header.php';
?>

<div class="header--posts">
    <div class="post" style="margin: auto;">
        <label for="title">Заголовок</label>
        <input type="text" name="title" value="" maxlength="30">
        <label for="">Текст (до 10.000 символов)</label>
        <div class="formatting_buttons">
            <button class="u">U</button>
            <button class="o">O</button>
            <button class="s">S</button>
            <button class="i">I</button>
            <button class="b">B</button>
            <button class="h2">h2</button>
            <button class="h3">h3</button>
            <button class="br">br</button>
        </div>
        <textarea type="text" name="text" class="texttt" maxlength="30000" rows="10"></textarea>
        <label for="">Текст который отображается на главной (до 100 символов)</label>
        <textarea type="text" name="text_small" maxlength="100"></textarea>
        <label for="">Тема</label>
        <input type="text" maxlength="20" name="theme" value="">
        <div class="post_buttons">
            <button type="submit" class="create_post">Создать</button>
        </div>
    </div>
</div>

<script src="/src/js/jquery-3.6.0.min.js"></script>
<script src="/src/js/account.js"></script>
<script src="/src/js/formatting.js"></script>
