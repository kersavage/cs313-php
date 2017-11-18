<?php
/**********************************************************
* File: deleteEvent.php
* Author: Kylor Kersavage
* 
* Description: Inserts data from addEvent.php into event database
***********************************************************/
// get the data from updateEvent.php
$name = $_POST['name'];

require("dbConnect.php");
$db = get_db();
try
{
	// Give query placeholder values
	$query = "DELETE FROM event WHERE name='$name'";
	$statement = $db->prepare($query);
	
	$statement->execute();	
}

catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}

// Redirect to Rexburg Events home page
header("Location: myEvents.php");
die(); 
?>