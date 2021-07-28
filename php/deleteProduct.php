<?php
require_once("dbhelp.php");
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $query = "delete from product where id = ".$id;

    execute($query);
    echo "Xoá sản phẩm thành công";
}