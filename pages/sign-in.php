<?php 
 
 $error_login = ""; 
 $error_pass = ""; 
 $error_email = ""; 
 $error_pass_rep = ""; 
 $agree = '';

 if(isset($_POST['regPost'])){ 
 
        $login = $_POST['login']; 
        $email = $_POST['email']; 
        $password = $_POST['password']; 
        $password_repeat = $_POST['password_repeat']; 
         
        if($login === ''){ 
            $error_login .= '<p class="errors">Введите ваш логин!<br></p>'; 
        }else if(strlen($login) < 3){ 
            $error_login .= '<p class="errors">Логин не должен быть меньше 3 символов<br></p>'; 
        }else if(strlen($login) > 15){
            $error_login .= '<p class="errors">Логин не должен больше 15 символов<br></p>'; 
        }
 
        if($email === ''){ 
            $error_email .= '<p class="errors">Введите ваш email!<br></p>'; 
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
            $error_email .= '<p class="errors">неверный формат email!<br></p>'; 
        } 
 
        if($password === ''){ 
            $error_pass .= '<p class="errors">Введите пароль!<br></p>'; 
        }else if(strlen($password) < 3){ 
            $error .= '<p class="errors">Пароль не должен быть меньше 3 символов<br></p>'; 
        }else if(strlen($password) > 12){ 
            $error_pass .= '<p class="errors">Пароль не должен быть больше 12 символов<br></p>'; 
        } 
 
        if($password != $password_repeat){ 
            $error_pass_rep .= '<p class="errors">Пароли не совпадают!<br></p>'; 
        } 
 
        if($password_repeat === ''){ 
            $error_pass_rep .= '<p class="errors">Введите пароль!<br></p>'; 
        } 

        if (!isset($_POST["agree"])) {
            $agree = '<p class="errors">Для продолжения необходимо дать согласие на обработку персональных данных!</p>';
        }
        $checkUser = $connection->query("SELECT * FROM `users` WHERE email='$email'")->fetch(PDO::FETCH_ASSOC); 
 
        if(!empty($checkUser)){ 
 
            $error_email .= '<p class="errors">Данная почта уже зарегана!<br></p>'; 
 
        } 
 
        if($error_login === '' && $error_pass === '' && $error_email === '' && $error_pass_rep === '' && $agree === ''){ 
 
            $pass_md5 = md5($password); 
            $connection->query("INSERT INTO `users` (`login`, `email`, `password`) VALUES ('$login','$email','$pass_md5')"); 
 
            header("Location: ?page=login"); 
 
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
            <h2>регистрация</h2>
            <form method="Post" name="regPost" class="login-form">
                <div class="login-form-input">
                    <input type="text" name="login" placeholder="Login" value="<?php if(isset($_POST['regPost'])){echo $_POST['login'];} ?>">
                    <?=$error_login?>
                    <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['regPost'])){echo $_POST['email'];} ?>">
                    <?=$error_email?>
                    <input type="password" name="password" placeholder="Пароль" value="<?php if(isset($_POST['regPost'])){echo $_POST['password'];} ?>">
                    <?=$error_pass?>
                    <input type="password" name="password_repeat" placeholder="Повторите пароль" value="<?php if(isset($_POST['regPost'])){echo $_POST['password_repeat'];} ?>">
                    <?=$error_pass_rep?>
                </div>
                <div class="chek-login">
                    <input class="chek" name="agree" type="checkbox" id="">
                    <a href="assets/pol-kof">Согласен на обработку персональных данных</a>
                </div>
                <?if(!empty($agree)){echo $agree;}?>
                <div class="login-enter">
                    <input type="submit" class="login-btn" name="regPost" value="Создать">
                    <div class="login-enter-p">
                        <p>Есть аккаунт?</p>
                        <a href="?page=login">Войти!</a>
                    </div>
                </div>
            <form/>
        </div>
    </section>
</body>
</html>