<?php
include 'dbconnect.php';
$id=$_post["id"];
//chatid for a conversation will be program generated and then it will be stored in chatlists of users.
$search=mysqli_query("SELECT * FROM chatlist'".$id."' WHERE serialnum IN (1,2,3,4) ");
$i=0;
while ($chatid=mysqli_fetch_assoc($search))) {
	$chatID[$i]=$chatid["chatid"];
	$matchID[$i]=$chatid["matchid"];
	$search=mysqli_query($con,"SELECT name,image FROM users WHERE user_id='".$matchID[$i]."'");
	$name[$i]=mysqli_fetch_assoc($search["name"]);
	$image[$i]=mysqli_fetch_assoc($search["image"]);
	$i++;
}

$response={"chatid0":$chatid[0],"chatid1":$chatid[1],"chatid2":$chatid[2],"chatid3":$chatid[3]};

?>