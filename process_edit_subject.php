<?php
//include premade functions
require_once("useful.funcs.php");

//connect to database
$mysqli = connectToDb();

$rowId = $_POST['id'];
$subject = $_POST['subject'];
$people = $_REQUEST['people'];

//run the query
$result = $mysqli->query("UPDATE jperina_final_subjects SET subject='{$subject}' WHERE id={$rowId}");

//remove previous entries for this subject
$remove = $mysqli->query("DELETE FROM jperina_final_people_subjects WHERE subject={$rowId}");

//loop through teacher
foreach ($people as $person) : 

	//insert teacher linked to coresponding subjects into database 
	$sub = $mysqli->query("INSERT INTO jperina_final_people_subjects (people, subject) VALUES ('{$person}', '{$rowId}')");

endforeach;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Update Result</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header"></div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<p>
						<?php if ($mysqli->error) {
							echo "The subject did not update" . $mysqli->error;
							}
							else {
								echo "The subject has been updated.";
							}
						?>
					</p>
					<div class="link">
						<a id="home" href="home.php">Home</a>
					</div>
					<div class="link">
						<a href="subject_admin.php">Edit Another</a>
					</div>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>

