<?php

$tovars = $connection->query("SELECT * FROM `tovars`")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Каталог</title>
    <link rel="shortcut icon" href="assets/img/icons/favicon.png" type="image/x-icon">
</head>

<body>
    <!-- start banner -->
    <section class="about-banner">
        <img class="about-img" src="assets/img/katalog/katalog-banner.png" alt="">
    </section>
    <!-- end banner -->

    <!-- start katalog -->
    <section class="katalog content">
        <div class="all-katalog-cards">
            <?php
            foreach ($tovars as $tovar) { ?>
                <div class="katalog-card">
                    <img class="katalog-main-photo" src="<?= $tovar['img'] ?>" alt="">
                    <div class="katalog-card-info">
                        <h3><?= $tovar['name'] ?></h3>
                        <div class="katalog-sum">
                            <h3><?= $tovar['price'] ?> ₽</h3>
                            <a href="?page=tovar-card&id=<?= $tovar['id'] ?>"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-two.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-three.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-four.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-one.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-two.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-three.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-four.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-one.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-two.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-three.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-four.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-one.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-two.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-three.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="katalog-card">
                <img class="katalog-main-photo" src="assets/img/katalog/katalog-four.png" alt="">
                <div class="katalog-card-info">
                    <h3>Кроссовки Adidas Support ADV PK</h3>
                    <div class="katalog-sum">
                        <h3>3 290 ₽</h3>
                        <a href="?page=tovar-card"><img class="katalog-buy" src="assets/img/katalog/katalog-buy.png" alt=""></a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- end katalog -->
</body>

</html>