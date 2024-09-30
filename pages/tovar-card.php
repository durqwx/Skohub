<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $tovars = $connection->query("SELECT * FROM `tovars` WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/icons/favicon.png" type="image/x-icon">
</head>

<body>
    <!-- start card-tovar -->
    <section class="card-tovar content">
        <div class="card-tovar-img">
            <div class="card-tovar-three-img">
                <img src="<?= $tovars['img2'] ?>" alt="">
                <img src="<?= $tovars['img3'] ?>" alt="">
                <img src="<?= $tovars['img4'] ?>" alt="">
            </div>
            <img class="big" src="<?= $tovars['img'] ?>" alt="">
        </div>
        <div class="card-tovar-text">
            <div class="card-tovar-main-info">
                <img class="card-new" src="assets/img/card-tovar/sale-new.svg" alt="">
                <h2><?= $tovars['name'] ?></h2>
                <div class="card-tovar-price">
                    <h3><?= $tovars['price'] ?>₽</h3>
                    <p>Количество:<?= $tovars['kol'] ?></p>
                </div>
            </div>
            <div class="card-tovar-opisanie">
                <h3>ОПИСАНИЕ:</h3>
                <br>
                <div class="card-tovar-plus">
                    <p><?= $tovars['desc'] ?></p>
                    <a href=""><img src="assets/img/card-tovar/plus.svg" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <!-- end card-tovar -->
</body>

</html>