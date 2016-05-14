<?php
include "dbconnect.php";
$id=$_POST["id"];
$result=mysqli_query($con, "SELECT image, interest, location FROM users WHERE user_id='".$id."'");
$row=mysqli_fetch_assoc($result);
if($row["image"] && $row["interest"] && $row["location"])
{
	echo "";
}
echo "empty";

?>