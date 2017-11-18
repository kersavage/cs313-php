<?php
/**********************************************************
* File: signIn.php
* Author: Kylor Kersavage
* 
* Description: The sign in page.
***********************************************************/
session_start();
$badLogin = false;
// First check to see if we have post variables, if not, just
// continue on as always.
if (isset($_POST['username']) && isset($_POST['pass']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	// Connect to the DB
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT pass FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['pass'];
		// now check to see if the hashed password matches
		if (password_verify($pass, $hashedPasswordFromDB))
		{
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['username'] = $username;
			header("Location: RexburgEvents.php");
			die(); // we always include a die after redirects.
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}
// If we get to this point without having redirected, then it means they
// should just see the login form.
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
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
				<li style="float:right"><a class ="active" href="newUser.php">Sign In</a></li>
				
			</ul>	
	</div>
	</header>

<div class="content">
<h1>New user? click <a href="newUser.php">here</a> to sign up.</h1><br /><hr>

<?php
if($badLogin == true)
	echo '<h2>Incorrect Login!</h2><br>';

?>

<form id="mainForm" action="signIn.php" method="POST">

	<label for="username">User Name</label><br />
	<input type="text" id="username" name="username"></input>
	<br /><br />

	<label for="pass">Password</label><br />
	<input type="password" id="pass" name="pass"></input>
	<br /><br />

	<input type="submit" value="Sign In" />

</form>
</div>
</body>
</html>