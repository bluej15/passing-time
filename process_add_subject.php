<?php

require_once("useful.funcs.php");

$mysqli = connectToDb();

$subject = sanitize($_POST['subject_name'], $mysqli);
$people = $_REQUEST['people'];

$result = $mysqli->query("INSERT INTO jperina_final_subjects (subject) VALUES ('{$subject}')");

//get id of inserted subject
$rowId = ($mysqli->insert_id);

//loop through teachers
foreach ($people as $person) : 

	//insert teacher linked to coresponding subjects into database 
	$sub = $mysqli->query("INSERT INTO jperina_final_people_subjects (people, subject) VALUES ('{$person}', '{$rowId}')");

endforeach;

if ($result) {
	header("Location: home.php");
}

else {
	header("Location: home.php?error=upload");
}

?>
