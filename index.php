<!DOCTYPE html>
<?php
	include 'dbconnect.php';
	if(loggedin())
	{
		header('Location: home.php');
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tinder</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>	
		<div class="modal" id="msg">
			<p><?php $msg=NULL;
			if(isset($_GET['msg']))
			{$msg=$_GET['msg']; echo $msg;}
			?></p>
		</div>
		
		<div id="menubar">	
			<div id="name and logo">
			<h2>Tinder</h2>
			</div>
			
			<div id="login&signup">
			<a id="button" href="register.php">Sign-UP</a><br><br>
			<a id="button" href="login.php">Login</a>
			</div>
		</div>
		
		<div id="dashboard">
			<p>
				INTERACT with new people 'near' you!!!<br>Don't be shy...<br><b>Tinder helps you find new friend according to their interest and gender !!!</b><br>So Sign-UP and make new friends to party HARD... YO!!!
				</p>
		</div>
		
</body>
</html>