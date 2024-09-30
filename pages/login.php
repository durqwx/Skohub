<?php 
    $error = '';
    $error_email = '';
    $error_pass = '';

 
    if(isset($_POST['auth'])){ 
 
        $email = $_POST['email']; 
        $password = $_POST['password']; 
        $pass_md5 = md5($password); 
 
        if($password === ''){ 
            $error_pass .= '<p class="errors">Введите пароль!<br></p>'; 
        } 
 
        if($email === ''){ 
            $error_email .= '<p class="errors">Введите почту!<br></p>'; 
        }else{ 
 
            $checkUser = $connection->query("SELECT * FROM users WHERE email='$email'")->fetch(PDO::FETCH_ASSOC); 
 
            if(empty($checkUser)){ 
 
                $error_email .= '<p class="errors">Неверный email или пароль!<br></p>'; 
 
            }else{ 
 
                $checkUser2 = $connection->query("SELECT * FROM users WHERE email='$email' AND password='$pass_md5'")->fetch(PDO::FETCH_ASSOC); 
 
                if(empty($checkUser2)){ 
                    $error .= '<p class="errors">Неверный email или пароль!<br></p>'; 
                } 
 
            } 
 
        } 
        
 
        if($error_email === '' && $error_pass === ''){ 
            $_SESSION['uid'] = $checkUser2['id'];
            if($checkUser2['role'] == 1) {
                header('Location: ?page=profile'); 
            } else if($checkUser2['role'] == 2){
            header('Location: ?page=admin-prof'); 
        }
    }
 
 
    } 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section class="login">
        <div class="login-block">
            <h2>авторизация</h2>
            <form action="" method="Post" name="auth" class="login-form">
                <div class="login-form-input">
                    <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['regPost'])){echo $_POST['email'];} ?>">
                    <?=$error_email?>
                    <input type="password" name="password" placeholder="Пароль" >
                    <?=$error_pass?>
                </div>
                <div class="login-enter">
                    <input class="login-btn" type="submit" name="auth" value="Войти">
                    <div class="login-enter-p">
                        <p>Нет аккаунта?</p>
                        <a href="?page=sign-in">Создать!</a>
                    </div>
                </div>
            <form/>
        </div>
    </section>
</body>
</html>