<?php
require_once("dbhelp.php");

function countProduct($type) {
    $query = "select count(id) as number from product";
    if($type > 0) {
        $query = "select count(id) as number from product where type=".$type;
    }
    $resuilt = executeResult($query);
    return $resuilt;
}

function showProduct() {
    $productList = [];
    $type='';
    $current_page = 1;
    $query = "";
//tim kiem
    if (isset($_GET["name"]) && $_GET["name"] != "") {
        global $name;
        $name = $_GET["name"];
        $query = 'select * from product as p,category as c where name like "%'.$name.'%" and p.TYPE = c.TYPE';
        $productList = executeResult($query);
    } 

    elseif (isset($_GET['page'])) {
        $current_page = $_GET['page'];
        //print$current_page;exit;
        $index = ($current_page - 1)*10;
        //print$index;exit;
        $query = "select* from product limit ".$index.",10";
        //print $query;exit;
        $productList = executeResult($query);
        if (isset($_GET['type']))
        {
            if ($_GET['type']==0) {
                $query = "select* from product as p, category as c where p.type=c.type limit ".$index.",10";
                // print $query;exit;
                $productList = executeResult($query);
            }
            else {
                $type = $_GET['type'];
                $query = "select* from product as p, category as c where p.type=c.type and p.type =".$type." limit ".$index.",10";
                $productList = executeResult($query);
            } 
        }
    } 
    return $productList;

}
