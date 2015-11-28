<?php
?>
<html>
	<head>
		<title>Taste Buzz</title>
	</head>
	<body>
		<h1>Welcome to TasteBuzz</h1>
		<p>Please login below</p>
		<form action="login.php" method="post">
			<label for="email">Email: </label>
			<input name="email" id="email">
			<label for="password">Password: </label>
			<input name="password" id="password">
			<input type="hidden" name="function" id="function" value="login">
			<input type="submit" value="Submit">
		</form>
		<p>Dont have an account? Register below</p>
		<form action="login.php" method="post">
			<label for="fname">First Name: </label>
			<input name="fname" id="fname">
			<label for="lname">Last Name: </label>
			<input name="lname" id="lname">
			<label for="email">Email: </label>
			<input name="email" id="email">
			<label for="password">Password: </label>
			<input name="password" id="password">
			<input type="hidden" name="function" id="function" value="register">
			<input type="submit" value="Submit">
		</form>
	</body>
</html>