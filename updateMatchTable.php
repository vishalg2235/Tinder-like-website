<?php
		include 'dbconnect.php';
		int $id=$_SESSION["id"];
		int $toatalrows=mysqli_query("SELECT COUNT(user_id) FROM users");
		int $serialnum=1;
		switch($row["sortgender"])
		{
			case "M":
			if($row["sortpriority"]=="d")
			{
				for(int $dist=0; $dist<=$row["sortdistance"]; $dist++)
				{
					for(int $com_int=count(explode(",",$row["interest"])); $com_int>0; $com_int--)
					{
						for(int $uid=1; $uid<=$totalrows; $uid++)
						{
						if($uid!=$id)
							{
								$res1=mysqli_query($con,"SELECT * FROM users WHERE user_id='".$uid."' AND gender='M' ");
								$uid_row=mysqli_fetch_array($res1);
								float $lat1=row["latitude"];	float $lon1=row["longitude"]; float $lat2=uid_row["latitude"]; float $lon2=uid_row["longitude"];
								float $dlat=$lat1-$lat2;	float $dlon=$lon1-$lon2;
								float $a=(sin(deg2rad(dLat/2))*sin(deg2rad(dLat/2)))+(cos(deg2rad(lat1)))*cos(deg2rad(lat2)))*sin(deg2rad(dLon/2))*sin(deg2rad(dLon/2)));
								float $c = 2 * atan2(sqrt($a), sqrt(1-$a));
								float $distCalculated = 6373 * $c;
								
								$int1=explode(",",$row["interest"]);	$int2=explode(",",$uid_row["interest"]);
								$commonInterest=array_intersect($int1,$int2);
								
								if((($distCalculated<=$dist)&&($distCalculated>($dist-1)))&&($com_int==(count($commonInterest))))
								{
									$serialnum=mysqli_query("SELECT serialnum FROM match'".$id."' WHERE matchid='".$uid."' ");
									if($serialnum)
									{
										mysqli_query("UPDATE match'".$id."' SET matchid='".$uid."' AND distance='".$distCalculated."' AND common_interest='".$commonInterest."' WHERE serialnum='".$serialnum."' ");
									}
									else
									{
									mysqli_query("INSERT INTO match'".$id."' (matchid,distance,common_interest) VALUES('$uid','$distCalculated','$commonInterest')");	
									}
								}
										
							}
									
						}
					}
				}
				echo "Your Matches has updated ! ";
			}
			else
			{
				for(int $com_int=count(explode(",",$row["interest"])); $com_int>0; $com_int--)
				{
					for(int $dist=0; $dist<=$row["sortdistance"]; $dist++)
					{
						for(int $uid=1; $uid<=$totalrows; $uid++)
						{
						if($uid!=$id)
							{
								$res1=mysqli_query($con,"SELECT * FROM users WHERE user_id='".$uid."' AND gender='M' ");
								$uid_row=mysqli_fetch_array($res1);
								float $lat1=row["latitude"];	float $lon1=row["longitude"]; float $lat2=uid_row["latitude"]; float $lon2=uid_row["longitude"];
								float $dlat=$lat1-$lat2;	float $dlon=$lon1-$lon2;
								float $a=(sin(deg2rad(dLat/2))*sin(deg2rad(dLat/2)))+(cos(deg2rad(lat1)))*cos(deg2rad(lat2)))*sin(deg2rad(dLon/2))*sin(deg2rad(dLon/2)));
								float $c = 2 * atan2(sqrt($a), sqrt(1-$a));
								float $distCalculated = 6373 * $c;
								
								$int1=explode(",",$row["interest"]);	$int2=explode(",",$uid_row["interest"]);
								$commonInterest=array_intersect($int1,$int2);
								
								if((($distCalculated<=$dist)&&($distCalculated>($dist-1)))&&($com_int==(count($commonInterest))))
								{
									$serialnum=mysqli_query("SELECT serialnum FROM match'".$id."' WHERE matchid='".$uid."' ");
									if($serialnum)
									{
										mysqli_query("UPDATE match'".$id."' SET matchid='".$uid."' AND distance='".$distCalculated."' AND common_interest='".$commonInterest."' WHERE serialnum='".$serialnum."' ");
									}
									else
									{
									mysqli_query("INSERT INTO match'".$id."' (matchid,distance,common_interest) VALUES('$uid','$distCalculated','$commonInterest')");	
									}
								}
										
							}
									
						}
					}
				}
				echo "Your Matches has updated ! ";
			}
			
			break;
			
			case "F":
			if($row[sortpriority]=="d")
			{
				for(int $dist=0; $dist<=$row["sortdistance"]; $dist++)
				{
					for(int $com_int=count(explode(",",$row["interest"])); $com_int>0; $com_int--)
					{
						for(int $uid=1; $uid<=$totalrows; $uid++)
						{
						if($uid!=$id)
							{
								$res1=mysqli_query($con,"SELECT * FROM users WHERE user_id='".$uid."' AND gender='F' ");
								$uid_row=mysqli_fetch_array($res1);
								float $lat1=row["latitude"];	float $lon1=row["longitude"]; float $lat2=uid_row["latitude"]; float $lon2=uid_row["longitude"];
								float $dlat=$lat1-$lat2;	float $dlon=$lon1-$lon2;
								float $a=(sin(deg2rad(dLat/2))*sin(deg2rad(dLat/2)))+(cos(deg2rad(lat1)))*cos(deg2rad(lat2)))*sin(deg2rad(dLon/2))*sin(deg2rad(dLon/2)));
								float $c = 2 * atan2(sqrt($a), sqrt(1-$a));
								float $distCalculated = 6373 * $c;
								
								$int1=explode(",",$row["interest"]);	$int2=explode(",",$uid_row["interest"]);
								$commonInterest=array_intersect($int1,$int2);
								
								if((($distCalculated<=$dist)&&($distCalculated>($dist-1)))&&($com_int==(count($commonInterest))))
								{
									$serialnum=mysqli_query("SELECT serialnum FROM match'".$id."' WHERE matchid='".$uid."' ");
									if($serialnum)
									{
										mysqli_query("UPDATE match'".$id."' SET matchid='".$uid."' AND distance='".$distCalculated."' AND common_interest='".$commonInterest."' WHERE serialnum='".$serialnum."' ");
									}
									else
									{
									mysqli_query("INSERT INTO match'".$id."' (matchid,distance,common_interest) VALUES('$uid','$distCalculated','$commonInterest')");	
									}
								}
										
							}
									
						}
					}
				}
				echo "Your Matches has updated ! ";
			}
			else
			{
				for(int $com_int=count(explode(",",$row["interest"])); $com_int>0; $com_int--)
				{
					for(int $dist=0; $dist<=$row["sortdistance"]; $dist++)
					{
						for(int $uid=1; $uid<=$totalrows; $uid++)
						{
						if($uid!=$id)
							{
								$res1=mysqli_query($con,"SELECT * FROM users WHERE user_id='".$uid."' AND gender='F' ");
								$uid_row=mysqli_fetch_array($res1);
								float $lat1=row["latitude"];	float $lon1=row["longitude"]; float $lat2=uid_row["latitude"]; float $lon2=uid_row["longitude"];
								float $dlat=$lat1-$lat2;	float $dlon=$lon1-$lon2;
								float $a=(sin(deg2rad(dLat/2))*sin(deg2rad(dLat/2)))+(cos(deg2rad(lat1)))*cos(deg2rad(lat2)))*sin(deg2rad(dLon/2))*sin(deg2rad(dLon/2)));
								float $c = 2 * atan2(sqrt($a), sqrt(1-$a));
								float $distCalculated = 6373 * $c;
								
								$int1=explode(",",$row["interest"]);	$int2=explode(",",$uid_row["interest"]);
								$commonInterest=array_intersect($int1,$int2);
								
								if((($distCalculated<=$dist)&&($distCalculated>($dist-1)))&&($com_int==(count($commonInterest))))
								{
									$serialnum=mysqli_query("SELECT serialnum FROM match'".$id."' WHERE matchid='".$uid."' ");
									if($serialnum)
									{
										mysqli_query("UPDATE match'".$id."' SET matchid='".$uid."' AND distance='".$distCalculated."' AND common_interest='".$commonInterest."' WHERE serialnum='".$serialnum."' ");
									}
									else
									{
									mysqli_query("INSERT INTO match'".$id."' (matchid,distance,common_interest) VALUES('$uid','$distCalculated','$commonInterest')");	
									}
								}
										
							}
									
						}
					}
				}
				echo "Your Matches has updated ! ";
			}
		
			break;
			
			case "A":
			if($row[sortpriority]=="d")
			{
				for(int $dist=0; $dist<=$row["sortdistance"]; $dist++)
				{
					for(int $com_int=count(explode(",",$row["interest"])); $com_int>0; $com_int--)
					{
						for(int $uid=1; $uid<=$totalrows; $uid++)
						{
						if($uid!=$id)
							{
								$res1=mysqli_query($con,"SELECT * FROM users WHERE user_id='".$uid."' ");
								$uid_row=mysqli_fetch_array($res1);
								float $lat1=row["latitude"];	float $lon1=row["longitude"]; float $lat2=uid_row["latitude"]; float $lon2=uid_row["longitude"];
								float $dlat=$lat1-$lat2;	float $dlon=$lon1-$lon2;
								float $a=(sin(deg2rad(dLat/2))*sin(deg2rad(dLat/2)))+(cos(deg2rad(lat1)))*cos(deg2rad(lat2)))*sin(deg2rad(dLon/2))*sin(deg2rad(dLon/2)));
								float $c = 2 * atan2(sqrt($a), sqrt(1-$a));
								float $distCalculated = 6373 * $c;
								
								$int1=explode(",",$row["interest"]);	$int2=explode(",",$uid_row["interest"]);
								$commonInterest=array_intersect($int1,$int2);
								
								if((($distCalculated<=$dist)&&($distCalculated>($dist-1)))&&($com_int==(count($commonInterest))))
								{
									$serialnum=mysqli_query("SELECT serialnum FROM match'".$id."' WHERE matchid='".$uid."' ");
									if($serialnum)
									{
										mysqli_query("UPDATE match'".$id."' SET matchid='".$uid."' AND distance='".$distCalculated."' AND common_interest='".$commonInterest."' WHERE serialnum='".$serialnum."' ");
									}
									else
									{
									mysqli_query("INSERT INTO match'".$id."' (matchid,distance,common_interest) VALUES('$uid','$distCalculated','$commonInterest')");	
									}
								}
										
							}
									
						}
					}
				}
				echo "Your Matches has updated ! ";
			}
			else
			{
				for(int $com_int=count(explode(",",$row["interest"])); $com_int>0; $com_int--)
				{
					for(int $dist=0; $dist<=$row["sortdistance"]; $dist++)
					{
						for(int $uid=1; $uid<=$totalrows; $uid++)
						{
						if($uid!=$id)
							{
								$res1=mysqli_query($con,"SELECT * FROM users WHERE user_id='".$uid."' ");
								$uid_row=mysqli_fetch_array($res1);
								float $lat1=row["latitude"];	float $lon1=row["longitude"]; float $lat2=uid_row["latitude"]; float $lon2=uid_row["longitude"];
								float $dlat=$lat1-$lat2;	float $dlon=$lon1-$lon2;
								float $a=(sin(deg2rad(dLat/2))*sin(deg2rad(dLat/2)))+(cos(deg2rad(lat1)))*cos(deg2rad(lat2)))*sin(deg2rad(dLon/2))*sin(deg2rad(dLon/2)));
								float $c = 2 * atan2(sqrt($a), sqrt(1-$a));
								float $distCalculated = 6373 * $c;
								
								$int1=explode(",",$row["interest"]);	$int2=explode(",",$uid_row["interest"]);
								$commonInterest=array_intersect($int1,$int2);
								
								if((($distCalculated<=$dist)&&($distCalculated>($dist-1)))&&($com_int==(count($commonInterest))))
								{
									$serialnum=mysqli_query("SELECT serialnum FROM match'".$id."' WHERE matchid='".$uid."' ");
									if($serialnum)
									{
										mysqli_query("UPDATE match'".$id."' SET matchid='".$uid."' AND distance='".$distCalculated."' AND common_interest='".$commonInterest."' WHERE serialnum='".$serialnum."' ");
									}
									else
									{
									mysqli_query("INSERT INTO match'".$id."' (matchid,distance,common_interest) VALUES('$uid','$distCalculated','$commonInterest')");	
									}
								}
										
							}
									
						}
					}
				}
				echo "Your Matches has updated ! ";
			}
		
			break;			
		}
		echo "Your Matches has not been updated ! Please try again... ";
?>