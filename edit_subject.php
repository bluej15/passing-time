<?php

//include premade functions
require_once("useful.funcs.php");

$rowId = $_GET['id'];

//connect to database
$mysqli = connectToDb();

//get all results from indicated database
$result = $mysqli->query("SELECT * FROM jperina_final_subjects WHERE id={$rowId}");

$sub = $mysqli->query("SELECT * FROM jperina_final_people ORDER BY last_name ASC");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Subject</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h2>Update subject data:</h2>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<?php while ($row = $result->fetch_assoc()) : ?>
						<form action="process_edit_subject.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
							<br />
							<br />
							<label>Subject:</label>
							<input type="text" name="subject" value="<?php echo $row['subject']; ?>" />
							<br />
					<?php endwhile; ?>

							<h6>Who can teach this?</h6>
							<p id="user_checkbox_list">
								<?php while ($row = $sub->fetch_assoc()) : ?>
									<input id="checkbox" type="checkbox" name="people[]" value="<?php echo $row['id']; ?>" />
									<label><?php echo $row['last_name']; ?>, <?php echo $row['first_name']; ?></label>
									<br />
								<?php endwhile; ?>
							</p>
							<br />
							<input type="submit" value="Save" />
						</form>
						<a class="home" href="home.php"></a>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>


