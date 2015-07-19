<?php

//include premade functions
require_once("useful.funcs.php");

$rowId = $_GET['id'];

//connect to database
$mysqli = connectToDb();

//get all results from indicated database
$result = $mysqli->query("DELETE FROM jperina_final_subjects WHERE id={$rowId}");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Remove a Subject</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h1>Remove a Subject</h1>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<?php if (!empty($mysqli->error)) : ?>
						<h2>Errors:</h2>
						<p>
							This code triggered the following error: <?php echo $mysqli->error; ?>
						</p>
					<?php endif; ?>
					
					<?php if ($mysqli->affected_rows > 0) : ?>
						<p>
							Success! You removed <?php echo $mysqli->affected_rows; ?> subject.
						</p>
					<?php else : ?>
						<p>
							The entry failed to delete.
						</p>
					<?php endif; ?>
					<div>
						<button>
							<a id="home" href="home.php">Home</a>
						</button>
						<button>
							<a href="subject_admin.php">Edit Another</a>
						</button>
					</div>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
