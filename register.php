<?php include('ajaxjs.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="script.js"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Register</h1>
			<form method="post" action="register.php">
			<?php include('errors.php'); ?>
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password_1" placeholder="Password" id="password1" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password_2" placeholder="Password" id="password2" required>
				<label for="password">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="text" name="email" placeholder="Please enter your e-mail" id="email" required>
				<button type="submit" class="btn" name="reg_user">Register</button>
				<p>Already have an account?</p>
				<input onclick="location.href = 'index.html'" value="Login">
			</form>
		</div>
	</body>
</html>