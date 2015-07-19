<?php

require_once("useful.funcs.php");

$mysqli = connectToDb();

//get all results from indicated database
$result = $mysqli->query("SELECT * FROM jperina_final_subjects ORDER BY subject ASC");

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
					<h1>Add a teacher to the team</h1>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<br />
					<form action="process_add_user.php" method="POST">
						<label>First name: </label>
						<input type="text" name="first_name" />
						<br />
						<label>Last name: </label>
						<input type="text" name="last_name" />
						<br />
						<label>Email: </label>
						<input type="text" name="email" />
						<br />
						<h6 class="heading">Is this person currently available to teach?</h6>
						<p id="avail">
							<input id="radio" type="radio" name="avail" value="yes" />Available
							<input id="radio" type="radio" name="avail" value="no" />Unavailable 
						</p>
						<h6 class="heading">What subjects can this person teach?</h6>
						<p id="checkbox_list">
							<?php while ($row = $result->fetch_assoc()) : ?>
								<input  id="checkbox" type="checkbox" name="subjects[]" value="<?php echo $row['id']; ?>" />
								<label><?php echo $row['subject']; ?></label>
								<br />
							<?php endwhile; ?>
						</p>
						<br />
						<!--how to send the new teacher id (id=<?php echo $row['id']; ?>) from here so I can use it in a query? Is there even an id to GET at this point? -->
						<input type="submit" value="Add" />
					</form>
					<a id="home" href="home.php">Home</a>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
