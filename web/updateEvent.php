<?php
/**********************************************************
* File: updateEvent.php
* Author: Kylor Kersavage
* 
* Description: Inserts data from addEvent.php into event database
***********************************************************/
// get the data from updateEvent.php
$name = $_POST['name'];
$date = $_POST['date'];
$description = $_POST['description'];

require("dbConnect.php");
$db = get_db();
try
{
	// Give query placeholder values
	$query = "UPDATE event SET date='$date', description='$description' WHERE name='$name'";
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