<?php
	include_once("dbconnect.php");
	session_start();
	unset($_SESSION["id"]);
	unset($_COOKIE['id']);
	header('Location: index.php');
?>
