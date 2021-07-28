<?php
function clearLoggedUser(){
	unset($_SESSION['account']);
}
function getLoggedUser(){
    $user = isset($_SESSION['account']) ? $_SESSION['account'] : 0;
    //print_r(isset($_SESSION['account'])); exit;
	return $user;
}
function setLoggedUser($user){
    $_SESSION['account'] = $user;
    //print_r(isset($_SESSION['account'])); exit;
}

function checkLoggedUser(){
    $user = getLoggedUser();
	if (!$user) {
		header("Location: login.php");
		die();
    }
	return $user;
}