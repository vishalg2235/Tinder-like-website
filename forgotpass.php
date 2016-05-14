<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Sign-UP System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>	

	<div id="forgotpass">
		<form name="forgotpass" action="mail_changepass.php" onsubmit="return validinput()" method="post" >
		<table align="center" width="30%" border="0">
		<tr>
		<td><input type="text" name="name" placeholder="Name" required /></td>
		</tr>
		<tr>
		<td><input type="email" name="email" placeholder="Your Email" required /></td>
		</tr>
		<tr>
		<td><button type="submit" name="btn-fgtpass">Change Password</button></td>
		</tr>
		</table>
		</form>
	</div>
	
</body>
</html>