<!-- start header -->
<header class="content">
    <div class="header-left">
        <a href="?page=main"><img src="assets/img/logo/logo.svg" alt="logo" class="logo"></a>
        <input type="checkbox" id="burger">
        <label for="burger"></label>
        <nav class="header-nav">
            <a href="?page=main">главная</a>
            <a href="?page=about">о компании</a>
            <a href="?page=katalog">каталог</a>
            <a class="nav-orange" href="?page=novinka">news</a>
            <div class="burg-mail">
                <img src="assets/img/icons/mail.svg" alt="" class="mail">
                <a href="mailto:info@skohub_support.ru">info@skohub_support.ru</a>
            </div>
            <?php
            if (isset($_SESSION['uid'])) {
                if ($user['role'] != 2 && $user['role'] != 0) { ?>
                    <a href="?page=basket"><img class="burg-basket-hed" src="assets/img/icons/basket.svg" alt=""></a>
            <?php }
            } ?>
            
        </nav>
    </div>
    <div class="header-right">
        <div class="header-mail">
            <img src="assets/img/icons/mail.svg" alt="" class="mail">
            <a href="mailto:info@skohub_support.ru">info@skohub_support.ru</a>
        </div>
        <div class="header-icons">
            <?
            if (!isset($_SESSION['uid'])) { ?>
                <a class="header-btn" href="?page=login">вход / регистрация</a>
            <?
            }?>
            <?php
            if (isset($_SESSION['uid'])) {
                if ($user['role'] != 2 && $user['role'] != 0) { ?>
                    <a href="?page=profile"><img src="assets/img/icons/user.svg" alt=""></a>
                    <a href="?page=basket"><img class="basket-hed" src="assets/img/icons/basket.svg" alt=""></a>
            <?php }
            } ?>
            <?php
            if (isset($_SESSION['uid'])) {
                if ($user['role'] == 2 ) { ?>
                    <a href="?page=admin-prof"><img src="assets/img/icons/user.svg" alt=""></a>
            <?php }
            } ?>
        </div>
    </div>
</header>
<!-- end header -->