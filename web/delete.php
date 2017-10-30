<?php
/**********************************************************
* File: delete.php
* Author: Kylor Kersavage
* 
* Description: Allows you to delete an event
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
				<?php
				if($username != "")
					echo '<li><a href="myEvents.php">MY EVENTS</a></li>';
				?>
				<li><a href="about.html">About</a></li>
				<li style="float:right"><a class ="active" href="signIn.php">Sign In</a></li>
				
			</ul>	
	</div>
	</header>

<div class="content">
<h1>Type in the name of your event to confirm it's deletion</h1><br /><hr>
<form id="mainForm" action="deleteEvent.php" method="POST">

	<label for="name">Event Name (must match the event you want to delete)</label><br />
	<input type="text" id="name" name="name" required></input>
	<br /><br />

	<input type="submit" value="Delete Event" />

</form>
</div>
</body>
</html>