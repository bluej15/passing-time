<?php

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
//see http://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/ for better security
$password = encrypt($password);

//create a new row with this username/password combo
$result = $mysqli->query("INSERT INTO jperina_final_users (username, password) VALUES ('{$username}', '{$password}')");

//set a cookie that indicates that this user is logged-in
login($mysqli->insert_id);

//redirect to the home page
header("Location: home.php");

?>
