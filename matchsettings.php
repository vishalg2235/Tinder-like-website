<?php
	$sortgender=$_POST["sortgender"];
	$distance=$_POST["distance"];
	include "dbconnect.php";
	session_start();
	$matchsetting=mysqli_query("UPDATE users SET sortgender='".$sortgender."' AND sortdistance='".$distance."' WHERE user_id='".$_SESSION["id"]."'");
?>