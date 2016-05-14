<?php
	function loggedin()
	{
		if(isset($_SESSION["name"])||isset($_COOKIE["name"]))
			return true;
	}
	function check_changepass()
	{
		if(isset($_SESSION["fp_name"])||isset($_COOKIE["fp_name"]))
			return true;
	}
	function register()
	{
		//feed name, email, active='1', logintype into database... 
		include 'dbconnect.php';
		
	}
?>