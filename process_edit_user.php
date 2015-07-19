<?php
//include premade functions
require_once("useful.funcs.php");

//connect to database
$mysqli = connectToDb();

$rowId = $_POST['id'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$avail = $_POST['avail'];
$subjects = $_REQUEST['subjects'];

//run the query
$result = $mysqli->query("UPDATE jperina_final_people SET first_name='{$first}', last_name='{$last}', email='{$email}', avail='{$avail}' WHERE id={$rowId}");

//remove previous entries for this teacher
$remove = $mysqli->query("DELETE FROM jperina_final_people_subjects WHERE people={$rowId}");

//loop through subjects
foreach ($subjects as $subject) : 

	//insert teacher linked to coresponding subjects into database 
	$sub = $mysqli->query("INSERT INTO jperina_final_people_subjects (people, subject) VALUES ('{$rowId}', '{$subject}')");

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
							echo "The entry did not update" . $mysqli->error;
							}
							else {
								echo "The entry has been updated.";
							}
						?>
					</p>
					<div class="link">
						<a id="home" href="home.php">Home</a>
					</div>
					<div class="link">
						<a href="user_admin.php">Edit Another</a>
					</div>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>

