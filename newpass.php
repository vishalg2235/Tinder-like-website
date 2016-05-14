<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Sign-UP System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>	
		
	<script> 
	function passmatch()  
	{
		var pass1 = document.forms["changepass"]["pass1"].value;
		var pass2 = document.forms["changepass"]["pass2"].value;
		
		if ((pass1.length < 5)||(pass1.length > 16))
		{  
			document.getElementById("passmatch").innerHTML= "";
			document.getElementById("validpass").innerHTML= "Length of password must be between 6-16 !";
			return false;
		} 
		
		if(pass1!=pass2)
		{
			document.getElementById("validpass").innerHTML= "";
			document.getElementById("passmatch").innerHTML= "Password isn\'t matching !";
			return false;
		}
			
					
	}
	</script> 
	
	<center>
		<div id="changepass-form" class="modal-inner">
			<form name="changepass" action="changepass.php" onsubmit="return passmatch()" method="post">
				<table align="center" width="30%" border="0">
				<tr>
				<td><input type="password" name="pass1" placeholder="Change password" required /></td>
				</tr>
				<td><p id="validpass"></p></td>
				<tr>
				<td><input type="password" name="pass2" placeholder="Confirm Password" required /></td>
				</tr>
				<td><p id="passmatch"></p></td>
				<tr>
				<td><button type="submit" name="btn-cpass">Sign In</button></td>
				</tr>
				</table>
			</form>
		</div>
	</center>
		
</body>
</html>