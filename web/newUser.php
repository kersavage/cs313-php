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
</head>

<body>
	<!-- Navigation Bar -->
	<header>
	<div id="nav">
			<ul>
				<li><a href="RexburgEvents.php">Rexburg Events</a></li>
				<li><a href="addEvent.php">Create Event</a></li>
				<li><a href="about.html">About</a></li>
				<li style="float:right"><a class ="active" href="newUser.php">New User</a></li>
				
			</ul>	
	</div>
	</header>

<div class="content">
<h1>Pick a user name and password to get started</h1><br /><hr>
<form id="mainForm" action="insertUser.php" method="POST">

	<label for="username">User Name</label><br />
	<input type="text" id="username" name="username"></input>
	<br /><br />

	<label for="pass">Password</label><br />
	<input type="text" id="pass" name="pass"></input>
	<br /><br />

	<input type="submit" value="Create User" />

</form>
</div>
</body>
</html>