<!DOCTYPE>
<?php
	include 'dbconnect.php';
	if(!loggedin())
	{
		header('Location: index.php?msg=Login or Register');
	}
	
    else
	{
        if(isset($_SESSION['id'])){
            $id=$_SESSION['id'];
        }
		if(isset($_COOKIE['id'])){
			$id=$_COOKIE['id'];
        }
		$res=mysqli_query($con,"SELECT * FROM users WHERE user_id='$id'");
		$row=mysqli_fetch_array($res);
    }
?>
<html>

<script type = "text/javascript"  src = "/jquery.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
$.ajax({
	type:POST,
	url:"checkinfo.php",
	data:{"id":<?php$_SESSION["id"]?>},
	success: function(result){
		if(result=="empty")
		{
			$.("#personalinfo").show();
		}
		else()
		{
			loadmatch();
		}
	}
	
});
do
{
while(!navigator.geolocation)
{
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition,showerror);
		break;
	}
	else { 
		showmsg("Your browser doesn't support Geolocation !!!");
	}
}
function showPosition(position) {
	document.getElementByID("lat").value= position.coords.latitude;
	document.getElementByID("lon").value= position.coords.longitude;
}
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            showmsg("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            showmsg("Location information is unavailable.");
            break;
        case error.UNKNOWN_ERROR:
            showmsg("An unknown error occurred. Try again");
            break;
    }
}
}while(!position.coords.latitude)

function showmsg(msg)
{
	$("#msg").html(msg);
	$("#msg").show();
}	
	
function updateMatchTable()
{
	$.ajax({
		type:"POST",
		url:"updateMatchtable.php",
		success: function(){
			$("#msg").children("p").text(result);
			$("msg").show();
		}
	});
}
function loadchat()
{
	$("#tindermatch").html("");
	$.ajax({
		type:"POST",
		url:"chatmenu.php",  
		data:{"id":<?php$_SESSION["id"]?>},
		success: function(){
			$("#tindermatch").html(result);	//recieve the data from chatmenu.php and change the DOM.
		}
	});
	$.ajax({
		type:"POST",
		url:"loadchat.php",
		datatype:'json',
		data:{"id":<?php$_SESSION["id"]?>,"chatid":}, //send chatid[0] in the parametres for loadchat.php
		success: function(){
			$("#tindermatch").html(result);	//recieve message data and then change html content of chatbox.
		}
	});
}
function loadmatch(response)
{
	$("#image").attr("src","");
	$("#name&age").html("");
	$("#location").html("");
	$("#commoninterest").html("");
	$.ajax({
		type:"POST",
		url:"loadmatch.php",
		data:{"id":<?php$_SESSION["id"]?>,"response":response},
		success: function(){
			$("#matchdp").attr("src",result["src"]);
			$("#matchname").html(result["name"]+"		"+result["age"]);
			$("#location").html(result["location"]);
			$("#commoninterest").html(result["commonInterest"]);
			$("#distance").html(result["distance"]);
		}
	});
}

$("#editmatch").click(function(){
	$("#matchsettings").show();
});

$("#match").click(function(){;
	$("#match").css("background-color":"red");
	$("#chat").css("background-color":"white");
	$("#tindermatch").show();
	$("#messages").hide();
	loadmatch();
});
$("#yes").click(function(){
	loadmatch("yes");
});
$("#nope").click(function(){
	loadmatch("nope");
});
$("#chat").click(function(){;
	$("#chat").css("background-color":"red");
	$("#match").css("background-color":"white");
	$("#tindermatch").hide();
	$("#messages").show();
	loadchat();
});
});
</script>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome Home</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div class="modal" id="msg">
		<p><?php $msg=NULL;
		if(isset($_GET['msg']))
		{$msg=$_GET['msg']; echo $msg;}
        ?></p>
	</div>
	<div class="modal" id="matchsettings">
		<form name="matchsettings" action="matchsettings.php" method="POST" >
				<select name="sortgender">
					<option value="M"> Male</option>
					<option value="F"> Female</option>
					<option value="A"> Both</option>
				</select>
				<input type="number" name="distance" required />
		</form>
	</div>
	<div class="modal" id="personalinfo">
		<form action="personalinfo.php" method="POST" enctype="multipart/form-data">
			<h3>UPLOAD YOUR DISPLAY PICTURE</h3>
			<input type="file" name="image" >Choose Image (Image must be of jpg/png type of size < 2MB and square cropped)</input><br><br>
			<h3>CHOOSE YOUR INTERESTS</h3>
			<input type="checkbox" name="1" value="1">interest1</input>
			<input type="checkbox" name="2" value="2" >interest2</input>
			<input type="checkbox" name="3" value="3">interest3</input><br>
			<input type="checkbox" name="4" value="4" >interest4</input>
			<input type="checkbox" name="5" value="5">interest5</input>
			<input type="checkbox" name="6" value="6" >interest6</input><br>
			<input type="checkbox" name="7" value="7">interest7</input>
			<input type="checkbox" name="8" value="8" >interest8</input>
			<input type="checkbox" name="9" value="9">interest9</input><br>
			<input type="checkbox" name="10" value="10" >interest10</input>
			<input type="checkbox" name="11" value="11">interest11</input>
			<input type="checkbox" name="12" value="12" >interest12</input><br>
			<input type="checkbox" name="13" value="13">interest13</input>
			<input type="checkbox" name="14" value="14" >interest14</input>
			<input type="checkbox" name="15" value="15">interest15</input><br>
			<input type="checkbox" name="16" value="16" >interest16</input>
			<input type="checkbox" name="17" value="17">interest17</input>
			<input type="checkbox" name="18" value="18" >interest18</input><br>
			<input type="checkbox" name="19" value="19">interest19</input>
			<input type="checkbox" name="20" value="20" >interest20</input>
			<input type="text" name="lat" id="lat">Latitude</input>
			<input type="text" name="lon" id="lon">Longitude</input>
			<input type="submit" value="Submit">
		</form>
	</div>
	
	<div id="menubar">
			<div id="name and logo">
			<h2>Tinder</h2>
			</div>
			
			<div id="userinfo">
			<?php
			if(isset($row["image"]))
			{
				?> <div id="dp"><img src="<?php echo $row["image"]; ?>"></img></div>  <div id="name"><?php echo $row["name"]; ?></div> <?php	
			}
			else
			{
				?> <div id="dp"><img src="default.jpg"></img></div>  <div id="name"><?php echo $row["name"]; ?></div> <?php
			}
			?>
			</div>
			
			<div id="accountsettings">
				<ul>
				<!--  <li class="button" onclick="profile()">>Profile</li>  -->
				<li class="button" onclick="updateMatchTable()">>Update Matches</li> 
				<li id="editmatch" class="button">>Match Settings</li>
				<li class="button"><a href="logout.php">Logout</a></li>
				<li class="button"><a href="newpass.php">Change Password</a></li>
				</ul>
			</div>	
	</div>

	<?php
	if(row["active"]==0)
	{	
		?>
		<div id="dashboard">
		<h2>Verify your Email-ID</h2>
		<p>As the details of other user are private.<br> So you must verify your email-ID to use TINDER !</p>
		</div>
		<?php
	}
	else
	{
		?>
		<div id="dashboard">
			
				<div id="togglebar">
					<div class="button" id="match" >MATCH</div>
					<div class="button" id="chat" >CHAT</div>
				</div>
				<!-- for togglebar onready load match by httprequest then on each toggle use httprequest to show dynamic content -->
				<!-- for tindermatch create a table dynamically for every user to store the id's of users who matches the "sorting criteria" and one by one show matches to user -->
				<div id="tindermatch">
					<h3>MATCHES</h3>
					<div id="matchbox">
						<div id="image">
							<img id="matchdp" src=""></img>
						</div>
						<div id="name&age">
							<h3 id="matchname"></h3>
						</div>
						<div id="yes">
							<img src="localhost/login/yes.jpg"></img>
						</div>
						<div id="nope">
							<img src="localhost/login/nope.jpg"></img>
						</div>
						<div id="location">
							
						</div>
						<div id="commoninterest">
							
						</div>
						<div id="distance">
							
						</div>
					</div>
				</div>
				
				<div id="messages">
					<h3>CHATS</h3>
					<!-- for chat make a table for every user with the id's with a BLOB type value with mime type text/plain and edit that text after any conversation -->
					<div id="chatlist">
						<div class="chatmate" id="chat1">
							<img src=""></img>
							<h3></h3>
						</div>
						<div class="chatmate" id="chat2">
							<img src=""></img>
							<h3></h3>
						</div>
						<div class="chatmate" id="chat3">
							<img src=""></img>
							<h3></h3>
						</div>
						<div class="chatmate" id="chat4">
							<img src=""></img>
							<h3></h3>
						</div>
					</div>
					
					<div id="chatbox">
						<?php //in this box their should be a conversation like fb of the id selected or first id by default ?>
					</div>
				</div>
				<!-- editmatch() will call updateMatchTable.php-->
				<div id="editmatch" class="button">
					MATCH SETTINGS
				</div>
		</div>
		<?php
	}
	?>
	
</body>
</html>