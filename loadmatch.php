<?php
$id=$_POST["id"];
$response=$_POST["response"];
include "dbconnect.php";
if(isset($response))
{
	$matchid=mysqli_query($con,"SELECT matchid FROM match'".$id."' WHERE serialnum= (SELECT Min(serialnum) FROM match'".$id."' WHERE response= NULL)");
	$search=mysqli_query($con,"UPDATE match'".$id."' SET response='".$response."' WHERE serialnum= (SELECT Min(serialnum) FROM match'".$id."' WHERE response= NULL)");
	if($response=="yes")
	{
		$chatid=mysqli_query($con, "SELECT * FROM chatid");
		$newchatid=mysqli_query($con, "INSERT INTO chatid (chatid) VALUES ('".($chatid+1)."') ");
		if(mysqli_query($con, "SELECT * FROM chatlist'".$id."'"))
		{
			$insertchatlist=mysqli_query($con, "INSERT INTO chatlist'".$id."' (matchid,chatid) VALUES ('".$matchid."','".$chatid."') ");
		}
		else
		{
			$createchat=mysqli_query($con, "CREATE chatlist'".$id."' (serialnum INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,matchid INT(6) UNIQUE,chatid VARCHAR(20))");
			$insertchatlist=mysqli_query($con, "INSERT INTO chatlist'".$id."' (matchid,chatid) VALUES ('".$matchid."','".$chatid."') ");
		}
		
	}
}

$search=mysqli_query($con,"SELECT matchid, common_interest, distance FROM match'".$id."' WHERE serialnum= (SELECT Min(serialnum) FROM match'".$id."' WHERE response= NULL)");
$commondata=mysqli_fetch_array($search);

$search=mysqli_query($con,"SELECT name, age, location, image FROM users WHERE user_id='".$commondata["matchid"]."'");
$personaldata=mysqli_fetch_array($search);

$response={"image": $personaldata["image"], "name": $personaldata["name"], "age": $personaldata["age"],"location": $personaldata["location"], "distance": $commondata["distance"], "commonInterest": $commondata["common_interest"]};
echo $response;
?>