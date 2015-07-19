<?php

//include premade functions
require_once("useful.funcs.php");

//get the username/password from the requested data
$username = $_POST['username'];
$password = $_POST['password'];

//connect to database
$mysqli = connectToDb();

//sanitize the user data (removes any weird characters)
// some useful fuctions include addslashes(), htmlentities(), mysqli_real_escape_string()
$username = sanitize($username, $mysqli);
$password = sanitize($password, $mysqli);

//encrypt password
$password = encrypt($password);

//search for a row with this username/password combo
$result = $mysqli->query("SELECT * FROM jperina_final_users WHERE username='{$username}' AND password='{$password}'");

//if the query finds a row with the same username/password, log them in
if ($result->num_rows) {
	//get this user's id from the row in the database table
	$row = $result->fetch_assoc();
	$userId = $row['id'];

	login($userId);

	//redirect to the home page
	header("Location: home.php");
}
else {
	//username/password didn't match any users in our database
	//redirect them to the login page
	header("Location: index.php");
}

?>
