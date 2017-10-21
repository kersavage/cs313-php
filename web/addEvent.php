<?php
/**********************************************************
* File: addEvent.php
* Author: Kylor Kersavage
* 
* Description: Retrieves data from a form to add to the event database
***********************************************************/

require("dbConnect.php");
$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>
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
<h1>Fill out the form to add an event</h1><br /><hr>
<form id="mainForm" action="insertEvent.php" method="POST">

	<label for="username">Your User Name</label><br />
	<input type="text" id="username" name="username"></input>
	<br /><br />

	<label for="name">Event Name</label><br />
	<input type="text" id="name" name="name"></input>
	<br /><br />

	<label for="date">Date MM/DD/YYYY</label><br />
	<input type="text" id="date" name="date"></input>
	<br /><br />

	<label for="description">Description:</label><br />
	<textarea id="description" name="description" rows="4" cols="50"></textarea>
	<br /><br />

	<input type="submit" value="Create Event" />

</form>
</div>
</body>
</html>