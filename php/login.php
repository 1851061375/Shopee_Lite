<?php
require_once("checkLogin.php");
require_once("dbhelp.php");


function login() {
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "Select * from account Where EMAIL = '".$email."' and PASSWORD = '".$password."'";

        $user = executeResult($query);
        //print_r($user); exit;

        if ($user != null) {
            session_start();
            $_SESSION['user'] = $user;
            //print_r($_SESSION['user']);exit();
            setLoggedUser($user);
            header("Location: admin.php");
            die();
        }            
    }
}

login();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee Lite</title>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/resetcss.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- using google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    
</head>
<body>
    <div class="app">
        <!-- Modal layout -->
         <div class="modal">
            <div class="modal__overlay">
            </div>

            <div class="modal__body">
                <!-- Login form -->
                <form method="POST" id = "login-form" class="auth-form">
                    <div class="auth-form__container">
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng Nhập</h3>
                            <span class="auth-form__switch-btn">Đăng Ký</span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input name = "email" id = "email" type="text" class="auth-form__input" placeholder="Email của bạn">
                                <span class="auth-form__message"></span>
                            </div>
                            <div class="auth-form__group">
                                <input name = "password" id = "password" type="password" class="auth-form__input" placeholder="Mật khẩu của bạn">
                                <span class="auth-form__message"></span>
                            </div>

                        </div>

                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="#" class="auth-form__help-link auth-form__help-link-forgot">Quên mật khẩu</a>
                                <span class="auth-form__help--separate"></span>
                                <a href="#" class="auth-form__help-link">Cần trợ giúp?</a>
                            </div>
                        </div>

                        <div class="auth-form__control">
                            <button class="btn auth-form__control-back">TRỞ LẠI</button>
                            <button type="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
                        </div>
                    </div>

                    <div class="auth-form__socical">
                        <a href="#" class="auth-form__socical--fb btn btn--with-icon btn--size-s">
                            <i class="auth-form__socical-icon fab fa-facebook-square"></i>
                            <span class="auth-form__socical-lable">Facebook</span>
                        </a>
                        <a href="#" class="auth-form__socical--gg btn btn--with-icon btn--size-s">
                            <i class="auth-form__socical-icon fab fa-google"></i>
                            <span class="auth-form__socical-lable">Google</span>
                        </a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    
</body>
</html>