<?php 
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['password']);
	setcookie("user", "", time() - 3600);
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>