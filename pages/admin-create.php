<?php

$users = $connection->query("SELECT * FROM users ")->fetchAll(PDO::FETCH_ASSOC);

$error = '';
$error_name = '';
$error_price = '';
$error_kol = '';
$error_desc = '';
$error_img = '';
$error_img2 = '';
$error_img3 = '';
$error_img4 = '';
$route1 = '';
$route2 = '';
$route3 = '';
$route4 = '';

if (!isset($_SESSION['uid'])) { 
    header('Location: ?page=main'); 
} else { 
    if ($user['role'] != 2) { 
        header('Location: ?page=main'); 
    } 
}


if (isset($_POST["addPost"])) {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $kol = $_POST["kol"];
    $desc = $_POST["desc"];

    if ($_FILES['img1']['size'] > 2 * 1024 * 1024) {
        $error .= '<p class="errors">слишком большой размер файла<br></p>';
    }

    if ($name === '') {
        $error_name .= '<p class="errors">Введите название!<br></p>';
    }

    if ($price === '') {
        $error_price .= '<p class="errors">Введите цену!<br></p>';
    }

    if ($kol === '') {
        $error_kol .= '<p class="errors">Введите колличество!<br></p>';
    }

    if ($desc === '') {
        $error_desc .= '<p class="errors">Введите описание!<br></p>';
    }

    $route2 = 'assets/img/' . time() . $_FILES['img2']['name'];
    $route1 = 'assets/img/' . time() . $_FILES['img1']['name'];
    $route3 = 'assets/img/' . time() . $_FILES['img3']['name'];
    $route4 = 'assets/img/' . time() . $_FILES['img4']['name'];

    if ($error == '') {


        if (move_uploaded_file($_FILES['img1']['tmp_name'], $route1) && move_uploaded_file($_FILES['img2']['tmp_name'], $route2) && move_uploaded_file($_FILES['img3']['tmp_name'], $route3) && move_uploaded_file($_FILES['img4']['tmp_name'], $route4)) {
            $connection->query("INSERT INTO `tovars`(`name`, `price`, `kol`, `desc`, `img`, `img2`, `img3`, `img4`) VALUES ('$name','$price','$kol','$desc','$route1','$route2','$route3','$route4')");
            // header('Location: ?page=admin');
        } else {
            $error .= '<p class="errors">ошибка загрузки изоражения<br></p>';
        }
    }
}
?>

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
        <div class="admin-users">
            <h3>Создать товар:</h3>
            <form class="login-form" method="post" name="addPost" enctype="multipart/form-data">
                <div class="login-form-input">
                    <input type="text" name="name" id="" placeholder="Название">
                    <?= $error_name ?>
                    <input type="text" name="price" id="" placeholder="Цена">
                    <?= $error_price ?>
                    <input type="text" name="kol" id="" placeholder="Количество">
                    <?= $error_kol ?>
                    <input type="text" name="desc" id="" placeholder="Описание">
                    <?= $error_desc ?>
                    <input type="file" name="img1">
                    <?= $error_img ?>
                    <input type="file" name="img2">
                    <?= $error_img2 ?>
                    <input type="file" name="img3">
                    <?= $error_img3 ?>
                    <input type="file" name="img4">
                    <?= $error_img4 ?>
                </div>
                <input type="submit" value="Создать товар" name="addPost" class="login-enter login-btn">
                <form />
        </div>
    </div>
</section>
<!-- admin-create end -->