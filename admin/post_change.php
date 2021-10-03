<?php

$for = $_GET['for'];
$id = $_GET['postid'];

if (isset($for) == 'redact') {
    if (isset($id)) {
        require '../vendor/database.php';
        $query = $mysqli->query("SELECT * FROM `posts` WHERE `id` = '$id'");
        $query = mysqli_fetch_assoc($query);
    } else {
        die('Ошибка! Данного поста нету или он был удалён');
    }
}
require '../src/components/admin/header.php';
?>

<div class="header--posts">
    <div class="post" style="margin: auto;">
        <label for="id">ID</label>
        <input type="text" name="id" value="<?= $query['id'] ?>" disabled>
        <label for="title">Заголовок</label>
        <input type="text" name="title" value="<?= $query['title'] ?>" maxlength="30">
        <label for="">Текст (до 10.000 символов)</label>
        <textarea type="text" name="text" maxlength="10000" rows="10"><?= $query['text'] ?></textarea>
        <label for="">Текст который отображается на главной (до 200 символов)</label>
        <textarea type="text" name="text_small" maxlength="200" rows="10"><?= $query['text_small'] ?></textarea>
        <label for="">Тема</label>
        <input type="text" name="theme" value="<?= $query['theme'] ?>">
        <div class="post_buttons">
            <button type="submit" class="updatePost">Изменить</button>
            <button type="submit" class="deletePost">Удалить</button>
        </div>
    </div>
</div>

<script src="/src/js/jquery-3.6.0.min.js"></script>
<script src="/src/js/account.js"></script>
