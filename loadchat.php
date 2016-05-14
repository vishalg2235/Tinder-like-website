<?php
include 'dbconnect.php';
$id=$_post["id"];
$chatid=$_post["chatid"];

$search=mysqli_query($con , "SELECT * FROM '".$chatid."' WHERE serialnum IN (1,2,3,4,5,6,7,8,9,10)");
while ($chat=mysqli_fetch_assoc($search))) {
	$to[$i]=$chat["to"];
	$from[$i]=$chat["from"];
	$msg[$i]=$chat["msg"];
	$time[$i]=$chat["time"];
	$seen[$i]=$chat["seen"];
	$i++;
}
echo json_encode($chat);
?>