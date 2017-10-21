<?php
/**********************************************************
* File: dbConnect.php
* Author: Kylor Kersavage
* 
* Description: Connect to the Rexburg Events data base
***********************************************************/
function get_db() {
	$db = NULL;
	try {
		// Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');
		// If no URL use localhost
		if (!isset($dbUrl) || empty($dbUrl)) {
			// postgres://user name:password@localhost:port/database
			$dbUrl = "postgres://postgres:1234@localhost:5432/rexburgevents";
		}
		// Break up the URL into it's parts
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		// PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		// PDO error handling
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $ex) {
		echo "Error connecting to DB. Details: $ex";
		die();
	}
	return $db;
}