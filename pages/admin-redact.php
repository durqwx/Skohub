<?php

$users = $connection->query("SELECT * FROM users ")->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['uid'])) { 
    header('Location: ?page=main'); 
} else { 
    if ($user['role'] != 2) { 
        header('Location: ?page=main'); 
    } 
}

if (isset($_GET['edit_id'])) {

    $id = $_GET['edit_id'];

    $tovars = $connection->query("SELECT * FROM `tovars` WHERE id=$id")->fetch(PDO::FETCH_ASSOC);

    $error = '';
    $error_name = '';
    $error_price = '';
    $error_kol = '';
    $error_desc = '';
    $route1 = '';
    $route2 = '';
    $route3 = '';
    $route4 = '';

    if (isset($_POST["editPost"])) {

        $name = $_POST["name"];
        $price = $_POST["price"];
        $kol = $_POST["kol"];
        $desc = $_POST["desc"];


        if ($_FILES['img']['size'] == 0 && $_FILES['img2']['size'] == 0 && $_FILES['img3']['size'] == 0 && $_FILES['img4']['size'] == 0) { 
            $route = $tovars['img']; 
            $connection->query("UPDATE `tovars` SET `name`='$name',`price`='$price',`kol`='$kol',`desc`='$desc',`img`='$route1',`img2`='$route2',`img3`='$route3',`img4`='$route4' WHERE id={$_GET['edit_id']}");
            header('Location: ?page=admin-tovars'); 
        } else { 

        
            $route1 = 'assets/img/' . time() . $_FILES['img']['name'];
            $route2 = 'assets/img/' . time() . $_FILES['img2']['name'];
            $route3 = 'assets/img/' . time() . $_FILES['img3']['name'];
            $route4 = 'assets/img/' . time() . $_FILES['img4']['name'];
    
            if ($error == '') {
    
                if (move_uploaded_file($_FILES['img']['tmp_name'], $route1) && move_uploaded_file($_FILES['img2']['tmp_name'], $route2) && move_uploaded_file($_FILES['img3']['tmp_name'], $route3) && move_uploaded_file($_FILES['img4']['tmp_name'], $route4)) {
                    $connection->query("UPDATE `tovars` SET `name`='$name',`price`='$price',`kol`='$kol',`desc`='$desc',`img`='$route1',`img2`='$route2',`img3`='$route3',`img4`='$route4' WHERE id={$_GET['edit_id']}");
                    // header('Location: ?page=admin');
                } else {
                    $error .= '<p class="errors">ошибка загрузки изоражения<br></p>';
                }
            }
        }

        if ($_FILES['img']['size'] > 2 * 1024 * 1024) {
            $error .= '<p class="errors">слишком большой размер файла<br></p>';
        }

?>
        <!-- <script>document.location.href = "?page=admin-tovar"</script> -->
<?php }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/icons/favicon.png" type="image/x-icon">
    <title>Профили</title>
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
            <div class="admin-users">
                <h3>Изменить товар:</h3>
                <form method="post" name="editPost" enctype="multipart/form-data" class="login-form">
                    <div class="login-form-input">
                        <input type="text" name="name" id="" placeholder="Название" value="<?= $tovars['name'] ?>">
                        <input type="text" name="price" id="" placeholder="Цена" value="<?= $tovars['price'] ?>">
                        <input type="text" name="kol" id="" placeholder="Количество" value="<?= $tovars['kol'] ?>">
                        <input type="text" name="desc" id="" placeholder="Описание" value="<?= $tovars['desc'] ?>">
                        <input type="file" name="img">
                        <input type="file" name="img2">
                        <input type="file" name="img3">
                        <input type="file" name="img4">
                    </div>
                    <input type="submit" value="Изменить" name="editPost" class="login-enter login-btn">
                    <form />
            </div>
        </div>
    </section>
    <!-- admin-create end -->
</body>

</html>