<?php
	
	$con=mysqli_connect("localhost","root","","tinder");
	if(!$con)
	{
		 die('oops Server connection problem ! --> '.mysqli_connect_error());
	}
	if(!mysqli_select_db($con,"tinder"))
	{
		 die('oops database selection problem !'.mysqli_connect_error());
	}

	function loggedin()
	{
		if(isset($_SESSION['id'])||isset($_COOKIE['id']))
		{
			$login=true;
			return $login;
		}
	}

?>