<?php
/**********************************************************
* File: newUser.php
* Author: Kylor Kersavage
* 
* Description: Provides a form to create a new user
***********************************************************/

require("dbConnect.php");
$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>New User</title>
	<link rel="stylesheet" href="rexburgEvents.css" type="text/css" />

	<!--- Validate Password -->
	<script type="text/javascript">
		function checkPassword(){
    		var pass = document.getElementById('pass');
    		var passConfirm = document.getElementById('passConfirm');
    		var message = document.getElementById('confirmMessage');
    		var green = "#66cc66";
    		var red = "#ff6666";
  
    		if(pass.value == passConfirm.value){
        		passConfirm.style.backgroundColor = green;
        		message.style.color = green;
        		message.innerHTML = "Passwords match"}
        	else{
        		passConfirm.style.backgroundColor = red;
        		message.style.color = red;
        		message.innerHTML = "Passwords do not match"}
		} 
</script> 
</head>

<body>
	<!-- Navigation Bar -->
	<header>
	<div id="nav">
			<ul>
				<li><a href="RexburgEvents.php">Rexburg Events</a></li>
				<li><a href="addEvent.php">Create Event</a></li>
				<li><a href="about.html">About</a></li>
				<li style="float:right"><a class ="active" href="signIn.php">Sign In</a></li>
				
			</ul>	
	</div>
	</header>

<div class="content">
<h1>Pick a user name and password to get started</h1><br /><hr>
<form id="mainForm" action="insertUser.php" method="POST">

	<label for="username">User Name</label><br />
	<input type="text" id="username" name="username" required></input>
	<br /><br />

	<label for="pass">Password</label><br />
	<input type="password" id="pass" name="pass" required></input>
	<br /><br />

<label for="passConfirm">Confirm Password</label><br />
	<input type="password" id="passConfirm" name="passConfirm" onkeyup="checkPassword(); return false;" required></input>
	<span id="confirmMessage" class="confirmMessage"></span>
	<br /><br />
	<input type="submit" value="Create User" />

</form>
</div>
</body>
</html>