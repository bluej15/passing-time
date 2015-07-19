<!DOCTYPE html>
<html>
	<head>
		<title>Teaching Database | Log In</title>
		<meta charset="utf-8">
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
					<h2>Please log in</h2>
					<form action="process_login.php" method="POST">
						<label for="username">username:</label>
						<input type="text" name="username" />
						<br />
						<label for="password">password:</label>
						<input type="password" name="password">
						<br />
						<input class="submit" type="submit" value="Log in" />
					</form>
				</div><!--end form_content-->
				<div class="clear"></div>
				<div class="form_footer"></div>
				<div class="clear"></div>
			</div><!--end form_container-->
		</div> <!--end wrapper-->
	</body>
</html>
