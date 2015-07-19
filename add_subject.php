<?php

require_once("useful.funcs.php");

$mysqli = connectToDb();

//get all results from indicated database
$result = $mysqli->query("SELECT * FROM jperina_final_people ORDER BY last_name ASC");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add a New Subject</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h1>Add a new subject</h1>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<form action="process_add_subject.php" method="POST">
						<br />
						<label>Subject name: </label>
						<input type="text" name="subject_name" />
						<br />
						<h6 class="heading">Who can teach this subject?</h6>
						<p id="checkbox_list">
							<?php while ($row = $result->fetch_assoc()) : ?>
								<input type="checkbox" name="people[]" value="<?php echo $row['id']; ?>" />
								<label><?php echo $row['last_name']; ?>, <?php echo $row['first_name']; ?></label>
								<br />
							<?php endwhile; ?>
						</p>
						<br />
						<input type="submit" value="Add" />
					</form>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
