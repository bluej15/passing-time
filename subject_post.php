<?php

require_once("useful.funcs.php");

$mysqli = connectToDb();

$subjectId = $_POST['subjects'];

$result = $mysqli->query("SELECT * FROM jperina_final_people_subjects i LEFT JOIN jperina_final_people p ON i.people = p.id WHERE subject='{$subjectId}' ORDER BY people DESC");

$sub = $mysqli->query("SELECT * FROM jperina_final_subjects WHERE id='{$subjectId}'");

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Teacher Picker</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h1>See who knows what</h1>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<?php while ($row = $sub->fetch_assoc()) : ?>
					<h3>Here is who can teach <?php echo $row['subject']; ?>.</h3>
					<?php endwhile; ?>	
					<?php while ($row = $result->fetch_assoc()) : ?>
					<p><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></p>
					<?php endwhile; ?>
					<br />
					<a id="home" href="home.php">Home</a>
					<br />
					<a href="subject_pre.php">View Another</a>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
