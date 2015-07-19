<?php

require_once("useful.funcs.php");

$mysqli = connectToDb();

$first = sanitize($_POST['first_name'], $mysqli);
$last = sanitize($_POST['last_name'], $mysqli);
$email = sanitize($_POST['email'], $mysqli);
$avail = $_POST['avail'];
$subjects = $_REQUEST['subjects'];

$result = $mysqli->query("INSERT INTO jperina_final_people (first_name, last_name, email, avail)VALUES ('{$first}', '{$last}', '{$email}', '{$avail}')");

//get id of inserted teacher
$rowId = ($mysqli->insert_id);

//loop through subjects
foreach ($subjects as $subject) : 

	//insert teacher linked to coresponding subjects into database 
	$sub = $mysqli->query("INSERT INTO jperina_final_people_subjects (people, subject) VALUES ('{$rowId}', '{$subject}')");

endforeach;

if ($result && $sub) {
	header("Location: home.php");
}

else {
	header("Location: home.php?error=upload");
}

?>
