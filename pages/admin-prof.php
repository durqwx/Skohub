<?

$users = $connection->query("SELECT * FROM users ")->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['uid'])) { 
    header('Location: ?page=main'); 
} else { 
    if ($user['role'] != 2) { 
        header('Location: ?page=main'); 
    } 
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
    <!-- admin-prof start -->
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
                    <p><?=$user['login']?></p>
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
                <h3>Пользователи:</h3>
                <div class="admin-users-list">
                    <?
                    foreach ($users as $user) { ?>
                        <div class="admin-list">
                            <p><?=$user['id']?></p>
                            <p><?=$user['login']?></p>
                            <p><?=$user['email']?></p>
                        </div>
                    <? }?>
                </div>
            </div>
        </div>
    </section>
    <!-- admin-prof end -->
</body>

</html>