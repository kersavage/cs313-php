<?php
/**********************************************************
* File: RexburgEvents.php
* Author: Kylor Kersavage
* 
* Description: This file displays the events
***********************************************************/
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}

require("dbConnect.php");
$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Rexburg Events</title>
	<link rel="stylesheet" href="rexburgEvents.css" type="text/css" />
</head>
<body>
<!-- Navigation bar -->
<header>
<div id="nav">
			<ul>
				<li><a href="RexburgEvents.php">REXBURG EVENTS</a></li>
				<li><a href="addEvent.php">CREATE EVENT</a></li>
				<?php
				if($username != "")
					echo '<li><a href="myEvents.php">MY EVENTS</a></li>';
				?>
				<li><a href="about.html">ABOUT</a></li>
				<li style="float:right"><a class ="active" href="signIn.php">SIGN IN</a></li>
				
			</ul>	
</div>
</header>

<div class="content">
	<h1>My Events</h1><br />
	<p>Click <a href="editEvent.php">HERE</a> to edit your events.</p><hr>

<?php
	echo '<h3>Username: ' . $username . '<hr>';
 
try
{
	
	$statement = $db->prepare("SELECT id, name, date, description, username FROM event Where username='$username'");
	$statement->execute();

	// Display each event from the database
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo '<p>';
		echo '<strong><h3>' . $row['name'] . '</h3>';
		echo '<br />';
		echo 'Date: ' . $row['date'];
		echo '<br />';
		echo '<br />';
		echo '</strong>';
		echo $row['description'];
		echo '<br />';
		echo '<br />';
		echo "Created by: ";
		echo $row['username'];
		echo '<br />';
		echo '<br />';
		echo '<hr>';
		echo '</p>';
	}
}
catch (PDOException $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
?>

</div>

</body>
</html>