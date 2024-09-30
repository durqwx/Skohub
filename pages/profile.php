<?
$error = '';
$error_login = '';
$error_email = '';

$user_id = $_SESSION['uid'];

if (!isset($_SESSION['uid'])) {
    header('Location: ?page=main');
}

if (isset($_POST["edit_user"])) {

    $login = $_POST["login"];
    $email = $_POST["email"];

    if (strlen($login) < 3) {
        $error_login = '<p class="errors">Логин не должен быть меньше 3 символов<br></p>';
    } else if (strlen($login) > 15) {
        $error_login = '<p class="errors">Логин не должен быть больше 15 символов<br></p>';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email .= '<p class="errors">неверный формат email!<br></p>';
    }

    if ($error == '' && $error_login == '' && $error_email == '') {
        $connection->query("UPDATE users SET `login`='$login' WHERE id=$user_id");

        header('Location: ?page=profile');
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
    <title>Профиль</title>
</head>

<body>
    <!-- start profile -->
    <section class="profile">
        <div class="profile-info content">
            <h2>СТРАНИЦА ПОЛЬЗОВАТЕЛЯ</h2>
            <div class="profile-block">
                <div class="username">
                    <div class="username-left">
                        <img class="username-logo" src="assets/img/profile/profile.svg" alt="">
                        <div class="username-text">
                            <p><?= $user['login'] ?></p>
                            <p><?= $user['email'] ?></p>
                        </div>
                    </div>
                    <a href="?exit" class="exit"><img class="username-exit" src="assets/img/profile/close.svg" alt=""></a>
                </div>
                <div class="sec-dan">
                    <div class="danniy">
                        <h3>Личные данные</h3>
                        <form method="post" name="edit_user" enctype="multipart/form-data" class="danniy-input">
                            <input class="inputt" type="text" name="login" id="" placeholder="Login" value="<?= $user['login'] ?>">
                            <?= $error_login ?>
                            <input class="inputt" type="text" name="email" id="" placeholder="Email" value="<?= $user['email'] ?>">
                            <?= $error_email ?>
                            <br>
                            <br>
                            <input type="submit" value="Изменить" name="edit_user" class="save-btn">
                            <form />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end profile -->
</body>

</html>