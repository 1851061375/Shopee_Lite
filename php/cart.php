<?php

use function PHPSTORM_META\type;

require_once("dbhelp.php");
session_start();

if (isset($_POST["id"])&&isset($_POST["size"])) {
    $id = $_POST["id"];
    $size = $_POST["size"];
    $count = 1;
    $query = "select*from product where id=".$id;
    $product = executeResult($query);
    //chua co cart
    if (!isset($_SESSION["cart"])) {
        $cart = array();
        $cart[$id] = array(
            'image' => $product[0]["PICTURE"],
            'name' => $product[0]["NAME"],
            'size' => $size,
            'count' => $count,
            'price' => $product[0]["PRICE"],
            'origin' => $product[0]["ORIGIN"]
        );
    //mua lan 2 tro di
    } else {
        $cart = $_SESSION["cart"];
        //mua lai sp cung size
        if (array_key_exists($id, $cart)&& $size==$cart[$id]["size"]) {
            $cart[$id] = array(
                'image' => $product[0]["PICTURE"],
                'name' => $product[0]["NAME"],
                'size' => $size,
                'count' => (int)$cart[$id]["count"] + 1,
                'price' => $product[0]["PRICE"],
                'origin' => $product[0]["ORIGIN"]
            );
        }
        //mua lai sp khac size(?)
        elseif (array_key_exists($id, $cart)&& $size!=$cart[$id]["size"]) {
            $cart[-$id] = array(
                'image' => $product[0]["PICTURE"],
                'name' => $product[0]["NAME"],
                'size' => $size,
                'count' => $count,
                'price' => $product[0]["PRICE"],
                'origin' => $product[0]["ORIGIN"]
            );
        }
        //mua sp moi
        else {
            $cart[$id] = array(
                'image' => $product[0]["PICTURE"],
                'name' => $product[0]["NAME"],
                'size' => $size,
                'count' => $count,
                'price' => $product[0]["PRICE"],
                'origin' => $product[0]["ORIGIN"]
            );
        }
    }
    $_SESSION["cart"] = $cart;
    
    echo "Đã thêm sản phẩm vào giỏ hàng!";
}