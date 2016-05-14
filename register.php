<!DOCTYPE html>

<?php
	include 'dbconnect.php';
	if(loggedin())
	{
	 header("Location: home.php");
	}
	
	if(isset($_POST['btn-signup']))
	{
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $pass = md5($_POST['pass']);
	 $age = $_POST['age'];
	 $gender = $_POST['gender'];
	 $college = $_POST['college'];
	 	 
	 $hash = md5(rand(1000,9999)); // Generate random 4 digit number hash and assign it to a local variable.

	 $sql="INSERT INTO users (name,email,password,age,gender,college,hash) VALUES('$name','$email','$pass','$age','$gender','$college','$hash')";
	 if(mysqli_query($con,$sql))
	 {
		//sending confirmation mail to the user to check the email id authentication 
		$headers = "From: confirmation_mail@tinder.com";
		$message = '
		 
		Thanks for signing up!
		Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
		 
		Please click this link to activate your account:
		localhost/login/verify.php?act=activate'.'&name='.$name.'&hash='.$hash.'
				 
		';
			  
		mail($email,"Confirmation of Email",$message,$headers);
		$res=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
		$row=mysqli_fetch_array($res);		
		session_start();
		$_SESSION["id"] = $row["user_id"];
		setcookie("id",$row["user_id"],time()+2592000);
		header("Location: home.php?msg=Successfully Registered and confirmation mail sent to your Email.");
	 }
	 else
	 {
		header("Location: index.php?Error while registering, Please Register again!");
	 }
	}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign-UP System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>	
		
	<script>   
	function validinput()  
	{
		var flag=0;
		var name = document.forms["signup"]["name"].value;
		var pass = document.forms["signup"]["pass"].value;
		
		if ((name.length < 5)||(name.length > 20))  
		{  
			document.getElementById("validpass").innerHTML= "";
			document.getElementById("validname").innerHTML= "Length of name must be between 6-12 !";
			return false;  
		}
		
		for(i=0;i<name.length;i++)
		{
			if ((((name.charCodeAt(i)>63)&&(name.charCodeAt(i)<91))||(name.charCodeAt(i)==95)||(name.charCodeAt(i)==46)||((name.charCodeAt(i)>96)&&(name.charCodeAt(i)<123))||((name.charCodeAt(i)>47)&&(name.charCodeAt(i)<58)))==0)  
				{
					flag=1;
				}
		}
		if(flag)
		{
			document.getElementById("validpass").innerHTML= "";
			document.getElementById("validname").innerHTML= "Name should only contain characters from (a-z, A-Z) !";
			return false;
		}
	
		
		if ((pass.length < 5)||(pass.length > 16))
		{
			document.getElementById("validname").innerHTML= "";
			document.getElementById("validpass").innerHTML= "Length of password must be between 6-12 !";
			return false;
		}
					
	}
	</script> 
	
	
		<!-- sign-up form --> 
	<center>
		<div id="SignUP-form" class="modal-inner">
			<form  name="signup" action="register.php" onsubmit="return validinput()" method="post" >
				<table align="center" width="30%" border="0">
				
				<tr>
				<td><input type="text" name="name" placeholder="Your Name" required /></td>
				</tr>
				<td><p id="validname"></p></td>
				
				<tr>
				<td><input type="email" name="email" placeholder="Your Email" required /></td>
				</tr>
				<td><p id="validemail"></p></td>
				
				<tr>
				<td><input type="password" name="pass" placeholder="Your Password" required /></td>
				</tr>
				<td><p id="validpass"></p></td>
				
				<tr>
				<td><input type="number" name="age" placeholder="Your Age" required /></td>
				</tr>
				
				<tr>
				<td><select name="gender">
					<option value="M"> Male</option>
					<option value="F"> Female</option>
				</select></td>
				</tr>
				
				<tr>
				<td><input type="text" name="college" placeholder="Your College" required /></td>
				</tr>
				
				<tr>
				<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
				</tr>
				
				</table>
			</form>
		</div>
	</center>

	
</body>
</html>
	