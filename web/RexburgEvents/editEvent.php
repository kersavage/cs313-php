<?php
/**********************************************************
* File: editEvent.php
* Author: Kylor Kersavage
* 
* Description: Allows you to edit an event
***********************************************************/

require("dbConnect.php");
$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>
	<link rel="stylesheet" href="rexburgEvents.css" type="text/css" />
	
		<!--- Check Date is Correct -->
		<script type="text/javascript">
			function checkdate(date)
			{
				var validformat=/^\d{2}\/\d{2}\/\d{4}$/
				var returnval=false
				if (!validformat.test(date.value))
					alert("Invalid date detected, please submit a date in the form MM/DD/YYYY")
				else
				{
					var month=date.value.split("/")[0]
					var day=date.value.split("/")[1]
					var year=date.value.split("/")[2]
					var dayobj = new Date(year, month-1, day)
						if ((dayobj.getMonth()+1!=month)||(dayobj.getDate()!=day)||(dayobj.getFullYear()!=year))
							alert("Invalid date detected, please submit a date in the form MM/DD/YYYY")
						else
							returnval=true
				}
				if (returnval==false) date.select()
					return returnval
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
<h1>Fill out the form to edit or delete your event</h1><br /><hr>
<form id="mainForm" onSubmit="return checkdate(this.date)" action="updateEvent.php" method="POST">

	<label for="name">Event Name (must match one of your events)</label><br />
	<input type="text" id="name" name="name" required></input>
	<br /><br />

	<label for="date">Date MM/DD/YYYY</label><br />
	<input type="text" id="date" name="date" required></input>
	<br /><br />

	<label for="description">Description:</label><br />
	<textarea id="description" name="description" rows="4" cols="50" required></textarea>
	<br /><br />

	<input type="submit" value="Update Event" /><input type=button onClick="location.href='delete.php'" value='Delete Event'>

</form>
</div>
</body>
</html>