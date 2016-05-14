<?php
	session_start();	
	include 'dbconnect.php';
		if(isset($_POST['btn-cpass']))
	{
	
	 $pass = md5(mysqli_real_escape_string($con,$_POST['pass2']));
	 $name = $_SESSION["name"];
	 $email = $_SESSION["email"];
	 
	$res=mysqli_query($con,"UPDATE users SET password='$pass' WHERE email='$email' AND name='$name'");
		
		if($res)
		{
			header("Location: home.php?msg=Your Password changed successfully...");
		}
	
		else
		{
			header("Location: index.php?msg=Try again !");
		}
	 	 
	}
?>