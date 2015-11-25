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
			<input id="email">
			<label for="password">Password: </label>
			<input id="password">
			<input type="hidden" id="action" value="login">
		</form>
		<p>Dont have an account? Register below</p>
		<form action="login.php" method="post">
			<label for="fname">First Name: </label>
			<input id="fname">
			<label for="lname">Last Name: </label>
			<input id="lname">
			<label for="email">Email: </label>
			<input id="email">
			<label for="password">Password: </label>
			<input id="password">
			<input type="hidden" id="action" value="register">
		</form>
	</body>
</html>