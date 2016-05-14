<!DOCTYPE html>
<?php
		session_start();

		include(dbconnect.php);
		
		if(loggedin()==true)
		{
			header('location: home.php');
		}
		
		if(isset($_POST['btn-login']))
		{
		 $email = $_POST['email'];
		 $pass = $_POST['pass'];
		 $rememberme = $_POST['rememberme'];
		 
		 if($name&&$pass)
			{
			 $res=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
			 $row=mysqli_fetch_array($res);
				if($row["password"]==md5($pass))
				{	
					$login=true;
				}
			
				else
				{
					$login=false;
					die("incorrect Email and password.");
				}
				if($login==true)
				{
					$id=$row["user_id"];
					if($rememberme=="on")
					{
						setcookie("id",$id,time()+2592000);
						
					}
					else
					{
						$_SESSION["id"] = $id;
					}
					
					if($row["active"]==0)
					{
						header("Location: home.php?msg=Account not activated yet!!! Open your email and click the link to activate your account.");
					}
					
					else
					{
						header("Location: home.php");
					}
				
				}
				
			}
			
			else
			{
				 die("Please enter a Email and password.");
			}
					 
		}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>	

	<center>
		<div id="login-form" class="modal-inner">
			<form name="login" action="login.php" method="post">
				<table align="center" width="30%" border="0">
				<tr>
				<td><input type="text" name="email" placeholder="Your email ID" required /></td>
				</tr>
				<tr>
				<td><input type="password" name="pass" placeholder="Your Password" required /></td>
				</tr>
				<tr>
				<td><input type="checkbox" name="rememberme"/>Remember me</td>
				</tr>
				<tr>
				<td><button type="submit" name="btn-login">Sign In</button></td>
				</tr>
				<tr>
				<td><a href="forgotpass.php">Forgot Password</a></td>
				</tr>
				</table>
			</form>
		</div>
	</center>
	
</body>
</html>