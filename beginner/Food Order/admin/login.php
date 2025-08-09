<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<div class="login" style="border-radius: 10px">
		<h1 class="text-center">Login</h1>
		<br /> <br/>
		
		<?php if (isset($_SESSION['success'])): ?>
			<p class="text-center" style="color: green"><?= $_SESSION['success']; unset($_SESSION['success']) ?></p><br /><br />
		<?php elseif (isset($_SESSION['error'])): ?>
			<p class="text-center" style="color: red"><?= $_SESSION['error']; unset($_SESSION['error']) ?></p><br /><br />
		<?php endif; ?>
		
		<!-- Login Form Starts Here -->
		<form action="handle/handle_login.php" method="post" class="text-center">
			<label for="username" class="admin-label">Username: </label><br /><br />
			<input type="text" id="username" name="username" class="input-responsive" style="!important;border: 1px solid gray; width: auto; height: 25px">
			<br /><br />
			<label for="password" class="admin-label">Password: </label><br /><br />
			<input type="password" id="password" name="password" class="input-responsive" style="!important;border: 1px solid gray; width: auto; height: 25px">
			<br /><br />
			<button type="submit" name="submit" class="btn-primary" style="!important;width: 80px; height: 40px">Login</button>
		</form>
		<!-- Login Form Ends Here -->
	</div>
</body>
</html>
