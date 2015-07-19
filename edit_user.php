<?php

//include premade functions
require_once("useful.funcs.php");

$rowId = $_GET['id'];

//connect to database
$mysqli = connectToDb();

//get all results from indicated database
$result = $mysqli->query("SELECT * FROM jperina_final_people WHERE id={$rowId}");

$sub = $mysqli->query("SELECT * FROM jperina_final_subjects ORDER BY subject ASC");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Teacher</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h2>Update teacher data:</h2>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<?php while ($row = $result->fetch_assoc()) : ?>
						<form action="process_edit_user.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
							<label>First name:</label>
							<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" />
							<br />
							<label>Last name:</label>
							<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" />
							<br />
							<label>Email:</label>
							<input type="text" name="email" value="<?php echo $row['email']; ?>" />
							<br />
							<p>
								Is this person currently available to teach?
								<br />
								<input type="radio" name="avail" value="yes" />Available <!--working, but not displaying current value-->
								<input type="radio" name="avail" value="no" />Unavailable 
							</p>
					<?php endwhile; ?>			
							<p>What subjects can this person teach?
								<br />
								<?php while ($row = $sub->fetch_assoc()) : ?>
									<input type="checkbox" name="subjects[]" value="<?php echo $row['id']; ?>" />
									<label><?php echo $row['subject']; ?></label>
									<br />
								<?php endwhile; ?>
							</p>
							<input type="submit" value="Save" />
						</form>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>


