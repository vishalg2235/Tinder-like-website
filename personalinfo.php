<?php 
include "dbconnect.php";
$id=$_SESSION["id"];
$lat=$_POST["lat"];
$lon=$_POST["lon"];
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lon.'&sensor=false');
$output= json_decode($geocode);
$location= $output->results[0]->formatted_address;
mkdir("'images/'.$id");
$tmpname=$_FILES['image']['name'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
$allowed= array("jpg","JPEG","png","PNG");
$_FILES['data']['name']=$id.'.'.$file_ext;
$filesize=filesize($tmpname);
for(i=1;i<=20;i++)
{
	$interest[$i]=$_POST[$i];
}

for(i=1;i<=20;i++)
{
	if(isset($interest[$i]))
		$interest_string+=$interest[$i].",";
}
$updatetable=mysqli_query($con, "UPDATE users SET location='".$location."' AND latitude='".$lat."' AND longitude='".$lon."' AND interest='".$interest."' WHERE user_id='".$id."'") or die(mysqli_error());
if(!in_array($fileext,$allowed)&& $filesize<2100000)
{
	move_uploaded_file($tmpname,"images/".$id."/".$_FILES['data']['name']);
	$updatetable=mysqli_query($con, "UPDATE users SET image='"."images/".$id."/".$_FILES['data']['name']."' WHERE user_id='".$id."'") or die(mysqli_error());
}
header("Location : home.php?msg=Wrong image extension choose jpg or png of size less than 2MB !!!");

?>