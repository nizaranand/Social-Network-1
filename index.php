<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script language="JavaScript" src="validator.js"></script>
	<title>What up homie?</title>
</head>

<body>
	<div class="logo">
		<img src="images/WPlogo.png" />
	</div
>	<div>
		<h1>Que te pasa?</h1>
		<div>
			<form action="newuser.php" method="GET">
				<input type="submit" value="New User?">
			</form>
			<br />
			<br />
			<?php
				if (isset($_SESSION['failure'])) {
					echo $_SESSION['failure'];
		    		$_SESSION['failure'] = "";	
				}

			?>
			<form action="partials/login.php" method="POST">
				<label for="user">Username</label>
				<input type="text" name="user" id="user"/>
				<br />
				<label for="password">Password</label>
				<input type="password" name="password" id="password"/>
				<br />
				<input type="submit" value="Log In?"/>
			</form>
		</div>
	</div>
</body>
</html>