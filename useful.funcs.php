<?php

function connectToDb() {
	//connect to the dtatbase
	$mysqli = new mysqli(	"mysql.students.wd.onepotcooking.com", 
							"scps", 
							"Kxnka5s3Vs", 
							"wd_practice");
	return $mysqli;
}

function sanitize($data, $mysqli) {
	$data = $mysqli->real_escape_string($data);
	return $data;
}

function encrypt($data) {
	$data = md5($data);
	return $data;
}

function login($userId) {
	// $cookieName = "id";
	// $cooieValue = $userId; //the id of the new row we just created
	Setcookie("id", $userId, time() + 60*60*24*365  , "/", "students.wd.onepotcooking.com");
}

?>
