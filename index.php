<?
require './components/connection.php';
global $connection;

session_start();

if (isset($_SESSION['uid'])) {

    $id = $_SESSION['uid'];
    $user = $connection->query("SELECT * FROM users WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['exit'])) {

    session_unset();
    header('Location: ?page=main');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/icons/favicon.png" type="image/x-icon">
    <title>Skohub</title>
</head>
<body>
    <?
    // if($_GET['page']!='admin-prof' && $_GET['page']!='admin-tovars' && $_GET['page']!='admin-delete' && $_GET['page']!='admin-redact'  && $_GET['page']!='admin-create') {
    //     require('pages/header.php');
    // }
    if (isset($_GET['page'])){
        $page = $_GET["page"];
        
        if ($_GET['page'] == 'main') {
            require 'pages/main.php';
        }
        if ($_GET['page'] == 'about') {
            require 'pages/about.php';
        }
        if ($_GET['page'] == 'admin-create') {
            require 'pages/admin-create.php';
        }
        if ($_GET['page'] == 'admin-delete') {
            require 'pages/admin-delete.php';
        }
        if ($_GET['page'] == 'admin-prof') {
            require 'pages/admin-prof.php';
        }
        if ($_GET['page'] == 'admin-redact') {
            require 'pages/admin-redact.php';
        }
        if ($_GET['page'] == 'admin-tovars') {
            require 'pages/admin-tovars.php';
        }
        if ($_GET['page'] == 'basket') {
            require 'pages/basket.php';
        }
        if ($_GET['page'] == 'katalog') {
            require 'pages/katalog.php';
        }
        if ($_GET['page'] == 'login') {
            require 'pages/login.php';
        }
        if ($_GET['page'] == 'novinka') {
            require 'pages/novinka.php';
        }
        if ($_GET['page'] == 'profile') {
            require 'pages/profile.php';
        }
        if ($_GET['page'] == 'sign-in') {
            require 'pages/sign-in.php';
        }
        if ($_GET['page'] == 'tovar-card') {
            require 'pages/tovar-card.php';
        }
        
    } else {
        require 'pages/main.php';
    }

    if($_GET['page']!='admin-prof' && $_GET['page']!='admin-tovars' && $_GET['page']!='admin-delete' && $_GET['page']!='admin-redact'  && $_GET['page']!='admin-create') {
        require('pages/footer.php');
    }
    ?>
</body>
</html>