<?php

require_once("define.php");

function logDebug($mess){
	error_log( date('d.m.Y h:i:s') . " $mess \n", 3, "log.log");
}

function sqlConnect() {
    global $connect;
    $connect = new mysqli(HOST, USENAME, PASSWORD, DATABASE);

    mysqli_set_charset($connect, "utf8");

    if (!$connect) {
        die("Connect failed: ".mysqli_connect_error());
    }
}

function sqlClose() {
    global $connect;
    mysqli_close($connect);
}

//Hàm thực hiện thêm, sửa, xóa, update
function execute($query) {
    global $connect;
    sqlConnect();
    logDebug("query=[$query]");
    $checkSuccess = mysqli_query($connect, $query);
    sqlClose();
    return $checkSuccess;
}

//Hàm thực hiện truy vấn
function executeResult($query) {
    global $connect;
    sqlConnect();
    logDebug("query=[$query]");
    $resuilt = mysqli_query($connect, $query);
    $list = [];
    if ($resuilt) {
        while($row = mysqli_fetch_array($resuilt)) {
            $list[] = $row;
        }
    }
    sqlClose();
    return $list;
}
