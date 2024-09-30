<?php

$tovars = $connection->query("SELECT * FROM `tovars`")->fetchAll(PDO::FETCH_ASSOC);
$tovar = $connection->query("SELECT * FROM `tovars`")->fetch(PDO::FETCH_ASSOC);
$users = $connection->query("SELECT * FROM users ")->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['uid'])) { 
    header('Location: ?page=main'); 
} else { 
    if ($user['role'] != 2) { 
        header('Location: ?page=main'); 
    } 
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $del_tovar = $connection->query("SELECT * FROM `tovars` WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['delete_id'])) {
    $del_id = $_GET['delete_id'];

    $connection->query("DELETE FROM `tovars` WHERE id=$del_id");

    header('Location: ?page=admin-tovars');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/icons/favicon.png" type="image/x-icon">
    <title>Удаление</title>
</head>

<body>
    <!-- admin-create start -->
    <section>
        <input type="checkbox" name="" id="burg">
        <label for="burg"></label>
        <div class="admin-nav">
            <div class="bgc-logo">
                <a href="?page=main"><img src="assets/img/admin/LOGO.png" alt=""></a>
            </div>
            <div class="bgc-left">
                <div class="admin-prof">
                    <img src="assets/img/admin/prof-admin.png" alt="">
                    <p><?= $user['login'] ?></p>
                    <a class="admin-exit-prof" href="?exit" class="exit"><img class="username-exit" src="assets/img/icons/admin-close.svg" alt=""></a>
                </div>
                <div class="bgc-links">
                    <a href="?page=admin-prof">Пользователи</a>
                    <a href="?page=admin-tovars">Товары</a>
                    <a href="?page=admin-create">Добавить товар</a>
                    <a href="?page=main">Выйти</a>
                </div>

            </div>
        </div>
        <div class="admin-block">
            <div class="admin-block-text">
                <h3 class="admin-h3">АДМИНИСТРАТИВНАЯ ПАНЕЛЬ</h3>
                <p>Добрый день, <?= $user['login'] ?></p>
            </div>
            <!-- start delite -->
            <section class="delite content">
                <div class="delite-block">
                    <div class="delite-text">
                        <h2>УДАЛИТЬ ТОВАР</h2>
                        <p>Вы действительно желаете удалить <?= $tovar['name'] ?>?</p>
                    </div>
                    <div class="delite-choice">
                        <a href="?page=admin-delete&delete_id=<?= $del_tovar['id'] ?>">Да</a>
                        <a href="?page=admin-tovars">Нет</a>
                    </div>
                </div>
            </section>
            <!-- end delite -->
        </div>
    </section>
    <!-- admin-create end -->
</body>

</html>