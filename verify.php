<?php
	session_start();
	include 'dbconnect.php';
	if(isset($_SESSION['registration']))
		{
		?>
				<script>alert('session started');</script>
				<?php
		}
	
	if(isset($_GET['act']) && !empty($_GET['act']) AND isset($_GET['name']) && !empty($_GET['name']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
		// Verify data
		$action = mysqli_real_escape_string($con,$_GET['act']); //set action to be taken
		$name = mysqli_real_escape_string($con,$_GET['name']); // Set name variable
		$hash = mysqli_real_escape_string($con,$_GET['hash']); // Set hash variable
					 
		$search = mysqli_query($con,"SELECT name, hash, active FROM users WHERE name='".$name."' AND hash='".$hash."' AND active='0'") or die(mysqli_error()); 
		$match  = mysqli_num_rows($search);
				
		if($match > 0)
		{
			// We have a match, activate the account
			mysqli_query($con,"UPDATE users SET active='1' WHERE name='".$name."' AND hash='".$hash."' AND active='0'") or die(mysqli_error());
			if(act=='activate')
			{
				$res=mysqli_query($con,"SELECT * FROM users WHERE name='".$name."' AND hash='".$hash."'");
				$row=mysqli_fetch_array($res);
				$id=row["user_id"];
				session_start();
				$_SESSION["id"] = $row["user_id"];
				setcookie("id",$row["user_id"],time()+2592000);
				//create match_id table 
				$match_table="CREATE TABLE match'".$id."' (serialnum INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,matchid INT(6) UNIQUE,response VARCHAR(1),distance INT(3),common_interest VARCHAR(50))";
				$match_table_insert="INSERT INTO match'".$id."'" 
				header("Location: home.php?msg=Your account activated successfully...");
			}
			else
			{
				header("Location: newpass.php");
			}
		}
		else
		{
			$search = mysqli_query($con,"SELECT name, hash, active FROM users WHERE name='".$name."' AND hash='".$hash."' AND active='1'") or die(mysqli_error()); 
			$match  = mysqli_num_rows($search);
			if($match>0)
			header("Location: home.php?msg=Account already activated!");
			else
			{
			session_start();
			unset($_SESSION["id"]);
			unset($_COOKIE['id']);
			header("Location: index.php?msg=You are using an old link ! If not then DON'T try to HACK my website :)");
			}
		}
					 
	}
	else
	{
		header("Location: index.php?msg=You are not authorised for that page!!!");
	}
	
?>