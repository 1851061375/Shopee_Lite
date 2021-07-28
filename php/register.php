<?php

require_once("dbhelp.php");

function register() {
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "Insert into `account` (`EMAIL`, `PASSWORD`)
                  Values ('".$email."','".$password."')";
        $resuilt = execute($query);
        
        if ($resuilt) {
            header("Location: login.php");  
            sqlClose();
        }
    }
}

register();

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
                <!-- Register form -->
                <form method="POST"  class="auth-form" id = "register-form">
                    <div class="auth-form__container">
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng Ký</h3>
                            <span class="auth-form__switch-btn">Đăng Nhập</span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input name = "email" type="text" id = "email" class="auth-form__input" placeholder="Email của bạn">
                                <span class="auth-form__message"></span>
                            </div>
                            <div class="auth-form__group">
                                <input name = "password" type="password" id = "password" class="auth-form__input" placeholder="Mật khẩu của bạn">
                                <span class="auth-form__message"></span>
                            </div>
                            <div class="auth-form__group">
                                <input name = "password_confirm" type="password" id = "password_confirm" class="auth-form__input" placeholder="Nhập lại mật khẩu">
                                <span class="auth-form__message"></span>
                            </div>
                        </div>
                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">Bằng việc đăng ký, bạn đã đồng ý với Shop Lập về</>
                            <a href="#" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                            <a href="#" class="auth-form__text-link">Chính sách bảo mật</a>
                        </div>

                        <div class="auth-form__control">
                            <button class="btn auth-form__control-back">TRỞ LẠI</button>
                            <button type="submit" class="btn btn--primary">ĐĂNG KÝ</button>
                        </div>
                    </div>

                    <div class="auth-form__socical">
                        <a href="#" class="auth-form__socical--fb btn btn--with-icon btn--size-s">
                            <i class="auth-form__socical-icon fab fa-facebook-square"></i>
                            <span class="auth-form__socical-lable">Kết nối với Facebook</span>
                        </a>
                        <a href="#" class="auth-form__socical--gg btn btn--with-icon btn--size-s">
                            <i class="auth-form__socical-icon fab fa-google"></i>
                            <span class="auth-form__socical-lable">Kết nối với Google</span>
                        </a>
                    </div>
                </form>               
                
            </div>
        </div>
    </div>

    <script src="../assets/js/main.js"></script>

    <script>
        Validator({
            form: '#register-form',
            errorSelector: '.auth-form__message',
            rules: [
                Validator.isEmail('#email'),
                Validator.minLength('#password',6),
                Validator.minLength('#password_confirm',6),
                Validator.isConfirm('#password_confirm', function() {
                    return document.querySelector('#register-form #password').value;
                },'Mật khẩu nhập lại không chính xác')
            ],
            // onSubmit: function(data) {
            //     //call api
            //     console.log(data);
            // }
        });
    </script>
</body>
</html>