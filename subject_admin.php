<?php

//include premade functions
require_once("useful.funcs.php");

//connect to database
$mysqli = connectToDb();

//get all results from indicated database
$result = $mysqli->query("SELECT * FROM jperina_final_subjects ORDER BY subject ASC");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit/Remove Subject</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h1>Edit or Remove a Subject</h1>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<?php while ($row = $result->fetch_assoc()) : ?>
					<div>
						<p id="subject_name"><?php echo $row['subject']; ?></p>
					</div>
					<div id="subject_edit_remove" class="edit_remove">
						<button>
							<a href="edit_subject.php?id=<?php echo $row['id']; ?>">edit</a>
						</button>
						<button>
							<a href="remove_subject.php?id=<?php echo $row['id']; ?>">delete</a>
						</button>
						<br />
					</div>
					<?php endwhile; ?>
					<br />
					<a id="home" href="home.php">Home</a>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
