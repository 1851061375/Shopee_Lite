<?php
require_once("dbhelp.php");
session_start();

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $cart = $_SESSION["cart"];

        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            echo "Xóa sản phẩm thành công!";
        }
        $_SESSION["cart"] = $cart;
}