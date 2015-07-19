<!DOCTYPE html>
<html>
	<head>
		<title>Movie Queue / Sign Up</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="" class="form_container">
				<div id="" class="form_header">
					<h1>Please sign up</h1>
				</div> <!--end form_header-->
				<div class="clear"></div>
				<div id="" class="form_content">
					<p>Already a user? <br /> <a href="index.php">Log in</a> here!</p>
					<form action="process_signup.php" method="POST">
						<label>username:</label>
						<input type="text" name="username" />
						<br />
						<label>password:</label>
						<input type="password" name="password"/>
						<br />
						<input type="submit" value="Sign up" />
					</form>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
