<?php
require_once("dbhelp.php");
session_start();

$id = 0;
if (isset($_GET['id'])) {
    global $id;
    $id = $_GET['id'];
}
else {
    header('Location:index.php?page=1&type=0');
    die();
}
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- using google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">

</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--separate">Kênh người bán</li>
                        <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                            Tải ứng dụng
                            <!-- Header QR -->
                            <div class="header__qr">
                                <img class="header__qr-img" src="../assets/img/qr_code.png" alt="QR code">
                                <div class="header__qr-apps">
                                    <a href="#" class="header__qr-link">
                                        <img class="header__qr-dowload" src="../assets/img/google_play.png" alt="Google play">
                                    </a>
                                    <a href="#" class="header__qr-link">
                                        <img class="header__qr-dowload" src="../assets/img/app_store.png" alt="App Store">
                                </div>
                                    </a>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <span class = "header__navbar-title--no-pointer">
                                Kết nối
                            </span>
                            <a href="#" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-facebook"></i>
                            </a>
                            <a href="#" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
    
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notify">
                            <a href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-bell"></i>
                                Thông báo
                            </a>
                            <!-- Header notify -->
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                <ul class="header__notify-list">
                                    <li class="header__notify-item header__notify-item--notview">
                                        <a href="#" class="header__notify-link">
                                            <img src="../assets/img/rate.png" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Cảm ơn bạn đã lựa chọn Shopee!</span>
                                                <span class="header__notify-description">Hãy đánh giá và chia sẻ cảm nhận của bạn về ứng dụng Shopee tại đây nhé! 👉</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item header__notify-item--notview">
                                        <a href="#" class="header__notify-link">
                                            <img src="../assets/img/airpay.jfif" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Săn voucher 1.000.000 cùng AirPay</span>
                                                <span class="header__notify-description">💵 Tham gia chuyển tiền trên Shopee cùng ví AirPay 
                                                    ⚡ Cơ hội nhận siêu voucher 1.000.000
                                                    💥 Thời gian từ 18.12 - 20.12
                                                    📲 Tham gia ngay
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="#" class="header__notify-link">
                                            <img src="../assets/img/update.jfif" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Cập nhật Shopee</span>
                                                <span class="header__notify-description">Không ngừng cải thiện sản phẩm để tăng cơ hội chốt đơn. 
                                                    Cập nhật ngay những việc "nên" và "không nên" khi đăng bán sản phẩm TẠI ĐÂY!
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="#" class="header__notify-link">
                                            <img src="../assets/img/voucher.png" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">HOT! Đón Giáng Sinh với voucher 100K</span>
                                                <span class="header__notify-description">⏰ Duy nhất lúc 12H hôm nay
                                                    🎄 Nhanh tay vào lấy ngay!</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notify-footer">
                                    <a href="#" class="header__notify-footer-btn">Xem tất cả</a>
                                </footer>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                             <a href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-question-circle"></i> 
                                Trợ giúp
                            </a>
                        </li>
                        <li onclick="window.open('login.php')" class="header__navbar-item header__navbar-item--bold header__navbar-item--separate">Đăng ký</li>
                        <li onclick="window.open('login.php')" class="header__navbar-item header__navbar-item--bold">Đăng nhập</li>
                    </ul>
                </nav>
                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="/" class="header__logo-link">
                            <div class="header__logo-img">
                                <svg class = "header__logo-img--shopee" fill="#fff" fill-rule="evenodd" enable-background="new 0 0 48 48" viewBox="0 0 48 48" x="0" y="0" ><path d="M44.4,11.5C44.4,11.5,44.4,11.5,44.4,11.5l-9.9,0C34.3,5.1,29.7,0,24,0S13.7,5.1,13.5,11.5H3.6v0c-0.5,0-0.9,0.4-0.9,0.9c0,0,0,0,0,0.1h0l1.4,30.9c0,0.1,0,0.2,0,0.3c0,0,0,0,0,0.1l0,0.1l0,0c0.2,2.2,1.8,3.9,3.9,4l0,0h31.4c0,0,0,0,0,0c0,0,0,0,0,0h0.1l0,0c2.2-0.1,3.9-1.8,4.1-4l0,0l0,0c0,0,0,0,0-0.1c0-0.1,0-0.1,0-0.2l1.5-31h0c0,0,0,0,0,0C45.3,11.9,44.9,11.5,44.4,11.5z M24,2.8c4.1,0,7.5,3.9,7.6,8.7H16.4C16.5,6.7,19.9,2.8,24,2.8z M31.9,35.8c-0.3,2.3-1.7,4.2-3.9,5.1c-1.2,0.5-2.8,0.8-4.1,0.7c-2-0.1-3.9-0.6-5.6-1.4c-0.6-0.3-1.6-1-2.3-1.5c-0.2-0.1-0.2-0.3-0.1-0.5c0.2-0.2,0.8-1.2,0.9-1.3c0.1-0.2,0.4-0.2,0.6-0.1c0,0,0.2,0.2,0.3,0.2c1.7,1.3,3.8,2.3,6.2,2.4c3,0,5.2-1.4,5.6-3.5c0.4-2.3-1.4-4.3-4.9-5.4c-1.1-0.3-3.9-1.5-4.5-1.8c-2.5-1.4-3.6-3.3-3.4-5.6c0.2-3.2,3.2-5.6,7-5.6c1.8,0,3.5,0.4,5,1c0.6,0.2,1.6,0.8,2,1.1c0.3,0.2,0.2,0.4,0.1,0.6c-0.2,0.2-0.6,0.9-0.8,1.2c-0.1,0.2-0.3,0.2-0.5,0.1c-1.9-1.3-3.9-1.7-5.7-1.8c-2.6,0.1-4.6,1.6-4.7,3.7c0,1.9,1.4,3.3,4.5,4.3C29.9,29.6,32.3,32,31.9,35.8z"></path></svg>
                            </div>
                            <div class="header__logo-img header__logo-img--separate">
                                <svg viewBox="0 0 220 44" class="header__logo-img--mall"><g fill="#fff" fill-rule="evenodd" transform="translate(0 -.098)"><path d="M195.78 30.899a10.49 10.49 0 0 1-6.81 2.484c-5.732 0-10.378-4.53-10.378-10.12 0-5.59 4.646-10.12 10.378-10.12 2.606 0 4.988.937 6.81 2.484.023-1.13.882-1.942 1.938-1.942 1.07 0 1.937.834 1.937 1.989v15.73c0 1.154-.868 1.98-1.937 1.98-1.07 0-1.938-.826-1.938-1.98zm-.062-7.643c0-3.588-3.024-6.497-6.755-6.497-3.73 0-6.754 2.91-6.754 6.497 0 3.588 3.024 6.498 6.754 6.498 3.73 0 6.755-2.91 6.755-6.498zM202.9 25.388V3.558c0-1.07.855-1.938 1.911-1.938s1.912.867 1.912 1.938v22.069c0 .043-.002.087-.004.13-.018 2.461.369 3.293 2.029 3.768 1.016.291 1.553 1.396 1.266 2.426-.237.854-.77 1.377-1.605 1.377h-.18c-.171 0-.347-.024-.52-.073-2.735-.783-4.904-2.78-4.81-7.867zM212.266 25.535V3.558c0-1.07.856-1.938 1.912-1.938s1.912.867 1.912 1.938V25.825c0 .082-.005.163-.015.242-.06 2.212.146 2.858 2.325 3.31 1.034.215 1.632 1.26 1.42 2.309-.186.916-.914 1.527-1.803 1.527-.127 0-.256-.013-.386-.04-2.882-.599-5.553-2.131-5.365-7.638zM97.886 24.307c.095.561.266 1.256.563 2.09 1.317 3.309 5.375 3.3 5.986 3.309 1.753.025 3.396-.331 5.011-1.223.906-.5 1.985-.412 2.556.405.572.818.395 2.028-.723 2.71-2.208 1.348-4.574 1.758-7.01 1.708-3.798-.078-7.4-1.591-9.01-5.204-.733-1.644-1.158-3.561-1.027-5.376.058-2.086.844-3.867 1.047-4.334.928-2.127 2.557-3.814 4.725-4.702 2.646-1.082 6.008-.916 8.53.43 2.936 1.566 4.571 5.136 4.41 8.384-.049.975-.799 1.803-1.817 1.803zm.412-3.333h10.906c-.86-4.592-5.845-4.37-5.845-4.37-2.52.098-4.207 1.555-5.061 4.37zM119.618 24.354c.095.561.266 1.257.563 2.09 1.318 3.31 5.376 3.3 5.986 3.31 1.753.024 3.396-.332 5.012-1.223.905-.5 1.984-.413 2.556.405.571.817.394 2.027-.723 2.71-2.209 1.347-4.574 1.758-7.011 1.707-3.797-.077-7.4-1.591-9.01-5.204-.732-1.644-1.158-3.56-1.026-5.376.058-2.085.843-3.867 1.047-4.333.928-2.127 2.557-3.815 4.725-4.702 2.645-1.083 6.007-.916 8.53.43 2.936 1.565 4.57 5.136 4.409 8.383-.049.976-.798 1.803-1.816 1.803zm.412-3.333h10.907c-.86-4.592-5.846-4.37-5.846-4.37-2.52.099-4.206 1.555-5.06 4.37zM74.109 30.871v11.367c0 2.34-3.632 2.337-3.632 0V23.806a10.064 10.064 0 0 1 0-1.329v-7.575c0-2.34 3.632-2.337 3.632 0v.51a10.537 10.537 0 0 1 6.768-2.434c5.756 0 10.422 4.55 10.422 10.164 0 5.613-4.666 10.164-10.422 10.164-2.584 0-4.947-.917-6.768-2.435zm0-7.207c.28 3.356 3.2 5.997 6.762 5.997 3.746 0 6.784-2.922 6.784-6.526 0-3.604-3.038-6.526-6.784-6.526-3.562 0-6.483 2.64-6.762 5.997zM57.09 33.306c-5.757 0-10.423-4.55-10.423-10.164s4.666-10.164 10.422-10.164 10.422 4.55 10.422 10.164c0 5.613-4.666 10.164-10.422 10.164zm-.007-3.645c3.747 0 6.784-2.922 6.784-6.526 0-3.604-3.037-6.526-6.784-6.526s-6.784 2.922-6.784 6.526c0 3.604 3.037 6.526 6.784 6.526zM28.69 15.026V2.111c0-2.337-3.631-2.34-3.631 0v29.471c0 2.337 3.631 2.341 3.631 0v-9.695c.015.364.018-.522.273-1.22.953-3.151 3.823-3.751 5.115-3.77 3.696 0 5.652 1.803 5.868 5.408V31.582c0 2.337 3.627 2.341 3.627 0v-6.126c0-1.753.106-3.676 0-4.789-.584-6.843-9.5-9.68-14.455-5.979a9.572 9.572 0 0 0-.428.338zM4.294 2.62c-2.156 1.909-3.15 5.385-2.369 8.155.678 2.4 2.66 4.27 4.803 5.323 2.222 1.09 4.676 1.673 6.564 2.505 1.32.59 2.456 1.153 3.595 2.305 1.138 1.152 1.62 2.586 1.587 3.65-.033 1.085-.441 2.182-1.023 2.869-1.487 1.755-3.889 2.414-6.106 2.303-1.572-.078-3.29-.422-4.692-1.016-1.42-.601-2.671-1.582-3.921-2.438-.807-.553-1.99-.282-2.526.631-.468.811-.098 1.92.693 2.505 2.376 1.757 4.89 3.1 7.808 3.631 2.918.532 5.463.41 8.09-.741 2.462-1.08 4.468-3.198 5.07-5.862.627-2.775-.09-5.41-1.923-7.58-2.21-2.618-5.47-3.626-8.54-4.733a24.208 24.208 0 0 1-3.295-1.423c-1.908-.973-2.883-2.363-2.75-4.528.158-2.578 2.278-3.913 4.906-4.266 2.628-.353 5.337.53 7.25 1.864 1.833 1.194 3.93-1.64 1.833-3.136C15.15-.207 8.288-.914 4.294 2.621z"></path><path d="M171.002 3.338c-1.545 4.329-5.841 7.27-10.7 7.186-4.8-.084-8.954-3.103-10.394-7.412-.33-.983-1.407-1.519-2.408-1.197a1.865 1.865 0 0 0-1.217 2.364c1.946 5.823 7.526 9.879 13.954 9.991 6.505.114 12.277-3.84 14.365-9.69a1.866 1.866 0 0 0-1.17-2.39c-.993-.342-2.082.171-2.43 1.148z" fill-rule="nonzero"></path><path d="M173.191 1.8a1.98 1.98 0 0 1 1.98 1.98v27.546a1.98 1.98 0 1 1-3.96 0V3.78a1.98 1.98 0 0 1 1.98-1.98zM147.807 1.8a1.98 1.98 0 0 1 1.98 1.98v27.546a1.98 1.98 0 1 1-3.96 0V3.78a1.98 1.98 0 0 1 1.98-1.98z"></path><circle cx="173.101" cy="3.691" r="2.07"></circle><circle cx="147.897" cy="3.691" r="2.07"></circle></g></svg>
                        
                            </div>
                        </a>    
                    </div>
                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm">
                            <!-- Search history -->
                            <div class="header__search-history" style="z-index: 2;">
                                <h3 class="header__search-history-heading">Lịch sử  tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="#">Bộ dụng cụ vệ sinh laptop</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="#">Giày Bitis Hunter</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="header__search-btn">
                            <i class="header__search-icon fas fa-search"></i>
                        </button>
                    </div>
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <!--No cart header__cart--nocart -->
                            <div class="header__cart-list">
                                <img class="header__cart--nocart-img" src="../assets/img/no_cart.png">
                                <span class="header__cart--nocart-mess">Chưa có sản phẩm</span>
                                    <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-list-item">
<?php

if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $item) { ?>
                                    <li class="header__cart-item">
                                        <img src="../assets/img/<?php echo$item["image"]?>" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                            <div class="header__cart-item-name-wrap">
                                                <h5 class="header__cart-item-name"><?php echo$item["name"]?></h5>
                                            </div>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price"><?php echo$item["price"]?></span>
                                                    <span class="header__cart-item-x">x</span>
                                                    <span class="header__cart-item-count"><?php echo$item["count"]?></span>
                                                    </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-descrip">Kích thước: <?php echo$item["size"]?></span>  
                                                <span onclick="deleteCart(<?php echo$key; ?>)" class="header__cart-item-remove">Xóa</span>
                                            </div>
                                    </div>
                                    </li>
<?php   }
}
else {
    echo 'Chưa có sản phẩm';
 } ?>
                                </ul>
                                    <button class="header__cart-btn btn btn--primary">Xem giỏ hàng</button>
                            </div>
                
                        </div>
                    </div> 
                </div>
            </div>
        </header>

        <div class="container">
        <div class="card">
        <?php
$query = "select*from product where id=".$id;
$product = executeResult($query);
//print($product[0]["NAME"]); exit;
foreach ($product as $item) {
    echo '<div class="shoeBackground">
            <h1 class="bitis">Biti\'s</h1>

            <a href="#" class="share"><i class="fas fa-share-alt"></i></a>

            <img src="../assets/img/'.$item["PICTURE"].'" alt="" class="shoe show" color="blue">
            <img src="img/red.png" alt="" class="shoe" color="red">
            <img src="img/green.png" alt="" class="shoe" color="green">
            <img src="img/orange.png" alt="" class="shoe" color="orange">
            <img src="img/black.png" alt="" class="shoe" color="black">

        </div>
        <div class="info">
        <div class="shoeName">
            <div>
                <span class="new">mall</span>
                <h1 class="big">'.$item["NAME"].'</h1>
            </div>
            <h3 class="small">'.$item["ORIGIN"].'</h3>
            </div>
            <div class="description">
                <h3 class="title">Mô tả</h3>
                <p class="text">
                Đôi giày không chỉ vật thể hiện cá tính, mà còn là người bạn đồng hành trên mỗi hành trình trải nghiệm.
                Lấy cảm hứng từ những khung truyện tranh còn bỏ trắng, BITI’S HUNTER  chính là những đôi giày được sinh ra để tôn vinh những dấu ấn trải nghiệm của riêng bạn.
                </p>
            </div>
            <div class="size-container">
                <h3 class="title">Kích thước</h3>
                <div class="sizes">
                    <span class="size">36</span>
                    <span class="size">37</span>
                    <span class="size active">38</span>
                    <span class="size">39</span>
                    <span class="size">40</span>
                </div>
            </div>
            <div class="buy-price">
                <button onclick="addToCart('.$item["ID"].')" class="buy"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                <div class="price">
                    <h1>'.$item["PRICE"].'</h1>
                </div>
            </div>

            </div>
        </div>';
}
?>
            
    </div>
    <script src="../assets/js/app.js"></script>
        
        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">CHĂM SÓC KHÁCH HÀNG</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="#" class="footer__link">Trung tâm trợ giúp</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Shopee Blog</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Shopee Mall</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Hướng Dẫn Mua Hàng</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Hướng Dẫn Bán Hàng</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Chính Sách Bảo Hành</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">VỀ SHOPPE LITE</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="#" class="footer__link">Giới thiệu về Shopee Lite</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Tuyển Dụng</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Điều Khoản Shopee Lite</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Chính Hãng</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Kênh Người Bán</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Liên Hệ Với Truyền Thông</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">THANH TOÁN</h3>
                        <ul class="footer__list-payment">
                            <li class="footer__item">
                                <div class="footer__item-payment footer__item-payment--visa"></div>
                            </li>
                            <li class="footer__item">
                                <div class="footer__item-payment footer__item-payment--airpay"></div>
                            </li>
                            <li class="footer__item">
                                <div class="footer__item-payment footer__item-payment--mastercard"></div>
                            </li>

                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">THEO DÕI CHÚNG TÔI TRÊN</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <i class="footer__item-icon fab fa-facebook"></i>
                                <a href="#" class="footer__link">Facebook</a>
                            </li>
                            <li class="footer__item">
                                <i class="footer__item-icon fab fa-instagram-square"></i>
                                <a href="#" class="footer__link">Instagram</a>
                            </li>
                            <li class="footer__item">
                                <i class="footer__item-icon fab fa-linkedin"></i>
                                <a href="#" class="footer__link">Linkedln</a>
                            </li>

                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">TẢI ỨNG DỤNG</h3>
                        <div class="footer__download">
                            <img src="../assets/img/qr_code.png"class="footer__download-qr">
                            <div class="footer__download-apps">
                                <a href="#" class="footer__download-apps-link">
                                    <img src="../assets/img/google_play.png"class="footer__download-apps-img">
                                </a>
                                <a href="#" class="footer__download-apps-link">
                                    <img src="../assets/img/app_store.png"class="footer__download-apps-img">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>

        function addToCart(id) {
            size = $(".size.active").text();
            $.post('cart.php', {
                // duu lieu day len
                'id' : id,
                'size': size
            },
            //du lieu tra ve
             function(data) {
                alert(data);
                location.reload();
            } )
        }

        function deleteCart(id) {
            option = confirm("Xóa sản phẩm này khỏi giỏ hàng?")
            if (!option) {
                return;
            }
            $.post('deleteCart.php', {
                'id': id
            },
            //du lieu tra ve
             function(data) {
                alert(data);
                location.reload();
            })
        }
    </script>
</body>
</html>