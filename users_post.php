<?php

require_once("useful.funcs.php");

$mysqli = connectToDb();

$userId = $_POST['people'];

$result = $mysqli->query("SELECT * FROM jperina_final_people_subjects i LEFT JOIN jperina_final_subjects s ON i.subject = s.id WHERE people='{$userId}' ORDER BY i.subject DESC");

$sub = $mysqli->query("SELECT * FROM jperina_final_people WHERE id='{$userId}'");

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
						<br />
						<?php while ($row = $sub->fetch_assoc()) : ?>
							<h3><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> can teach the following:</h3>
						<?php endwhile; ?>	
						<?php while ($row = $result->fetch_assoc()) : ?>
							<p><?php echo $row['subject']; ?></p>
						<?php endwhile; ?>
						<br />
						<div class="link">
							<a id="home" href="home.php">Home</a>
						</div>
						<div class="link">
							<a href="users_pre.php">View Another</a>
						</div>
					</div><!--end form_content-->
					<div class="clear"></div>
					<div class="form_footer"></div>
					<div class="clear"></div>
				</div><!--end form_container-->
			</div> <!--end wrapper-->
		</body>
</html>
