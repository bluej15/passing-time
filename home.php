<?php

require_once("useful.funcs.php");

$mysqli = connectToDb();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Teaching Database</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">	
			<div>
				<h1>Teacher and Class Management</h1>
			</div>
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h2>What do you need?</h2>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<br />
					<br />
					<ul> <!--display CRUD options for people-->
						<li><a href="users_pre.php">View Teachers</a></li>
						<li><a href="add_user.php">Add Teachers</a></li>
						<li><a href="user_admin.php">Edit/Remove Teachers</a></li><!--maybe this should be list and the edit/remove options are inside-->
					</ul>
					<br />
					<ul><!--display CRUD options for subjects-->
						<li><a href="subject_pre.php">View Subjects</a></li>
						<li><a href="add_subject.php">Add Subjects</a></li>
						<li><a href="subject_admin.php">Edit/Remove Subjects</a></li>
					</ul>
					<br />
					<br />
					<a id="logout" href="index.php">Log Out</a>
				</div> <!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
