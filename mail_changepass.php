<?php
	include 'dbconnect.php';
	session_start();
	if(isset($_POST['btn-fgtpass']))
	{
	 $name = mysqli_real_escape_string($con,$_POST['name']);
	 $email = mysqli_real_escape_string($con,$_POST['email']);
	 $_SESSION["name"]=$name;	//to be used in changepass.php
	 $_SESSION["email"]=$email;	//to be used in changepass.php
	 
	 $res=mysqli_query($con,"SELECT * FROM users WHERE name='$name' AND email='$email'");
	 $row=mysqli_fetch_array($res);
	 $hash = md5(rand(1000,9999)); 
	 mysqli_query($con,"UPDATE users SET hash='$hash',active=0 WHERE email='$email'");
		if(row)
		{
			$headers = "From: Changepassword@instiinfo.com";
		    $message = '
			 
			You have requested for changing your password!
			your account\'s password can be changed by pressing the url below.
			 
			Please click this link to activate your account:
			localhost/login/verify.php?act=changepass'.'&name='.$name.'&hash='.$hash.'
			 
			';
		  
		 mail($row["email"],"Confirmation of Email",$message,$headers);
		 
		}
	 
	}	
?>
