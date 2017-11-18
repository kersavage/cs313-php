<?php
/**********************************************************
* File: insertEvent.css
* Author: Kylor Kersavage
* 
* Description: Inserts data from addEvent.php into event database
***********************************************************/
// get the data from addEvent.php
$name = $_POST['name'];
$date = $_POST['date'];
$description = $_POST['description'];
$username = $_POST['username'];

require("dbConnect.php");
$db = get_db();
try
{
	// Give query placeholder values
	$query = 'INSERT INTO event(name, date, description, username) VALUES(:name, :date, :description, :username)';
	$statement = $db->prepare($query);
	
	// bind values to placeholders
	$statement->bindValue(':name', $name);
	$statement->bindValue(':date', $date);
	$statement->bindValue(':description', $description);
	$statement->bindValue(':username', $username);
	$statement->execute();	
}

catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}

// Redirect to Rexburg Events home page
header("Location: RexburgEvents.php");
die(); 
?>