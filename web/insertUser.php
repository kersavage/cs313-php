<?php
/**********************************************************
* File: insertUser.css
* Author: Kylor Kersavage
* 
* Description: Inserts data from addUser.php into users database
***********************************************************/
// get the data from addUser.php
$username = $_POST['username'];
$pass = $_POST['pass'];

require("dbConnect.php");
$db = get_db();
try
{
	// Give query placeholders
	$query = 'INSERT INTO users(username, pass) VALUES(:username, :pass)';
	$statement = $db->prepare($query);

	// bind values to placeholders
	$statement->bindValue(':username', $username);
	$statement->bindValue(':pass', $pass);
	$statement->execute();
}

catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
// Redirect to a comfirmation page
header("Location: userCreated.html");
die(); 
?>