<?php

//include premade functions
require_once("useful.funcs.php");

//connect to database
$mysqli = connectToDb();

//get all results from indicated database
$result = $mysqli->query("SELECT * FROM jperina_final_people ORDER BY last_name ASC");

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
					<h2>Select a teacher</h2>		
					<form action="users_post.php" method="POST">
						<label for="people">Teachers:</label>
						<select id="people" name="people">
							<option>Select One</option>
							<!-- loop through data and make it available as a drop down menu -->
							<?php while ($row = $result->fetch_assoc()) : ?>
							<option value="<?php echo $row['id']; ?>"><?php echo $row['last_name']; ?>, <?php echo $row['first_name']; ?></option>
						<?php endwhile; ?>
					</select>
					<br />
					<br />
					<input type="submit" value="Submit" />
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
