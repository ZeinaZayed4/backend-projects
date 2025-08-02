<?php

require_once 'functions.php';

const REQUIRED_FIELD_ERROR = "This field is required.";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
	$username = post_data('username');
	$email = post_data('email');
	$password = post_data('password');
	$password_confirm = post_data('password_confirm');
	$cv_url = post_data('cv_url');
	
	$errors = [];
	if (empty($username)) {
		$errors['username'] = REQUIRED_FIELD_ERROR;
	} elseif (strlen($username) < 6 || strlen($username) > 16) {
        $errors['username'] = "Username must be in between 6 and 16 characters.";
    }
	
	if (empty($email)) {
		$errors['email'] = REQUIRED_FIELD_ERROR;
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
	
	if (empty($password)) {
		$errors['password'] = REQUIRED_FIELD_ERROR;
	} elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be more than 6 characters.';
    }
	
	if (empty($password_confirm)) {
		$errors['password_confirm'] = REQUIRED_FIELD_ERROR;
	}
	
    if ($password && $password_confirm && strcmp($password, $password_confirm) != 0) {
		$errors['password_confirm'] = 'This must match the password field.';
    }
    
	if (!empty($cv_url) && !filter_var($cv_url, FILTER_VALIDATE_URL)) {
		$errors['cv_url'] = 'Invalid URL.';
    }
	
	if (empty($errors)) {
        echo "<div class='container mt-5'><div class='alert alert-success'>Welcome $username!</div></div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registration Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container mt-5">
		<form action="" method="post" class="row g-3" novalidate>
			<div class="col-md-6">
				<label for="username" class="form-label">Username</label>
				<input type="text" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
                       id="username" value="<?= $username ?? '' ?>">
                <div class="invalid-feedback">
                	<?= $errors['username'] ?? '' ?>
                </div>
			</div>
			<div class="col-md-6">
				<label for="email" class="form-label">Email</label>
				<input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                       id="email" value="<?= $email ?? '' ?>">
                <div class="invalid-feedback">
					<?= $errors['email'] ?? '' ?>
                </div>
			</div>
			<div class="col-md-6">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                       id="password" value="<?= $password ?? '' ?>">
                <div class="invalid-feedback">
					<?= $errors['password'] ?? '' ?>
                </div>
			</div>
			<div class="col-md-6">
				<label for="repeatPassword" class="form-label">Repeat Password</label>
				<input type="password" name="password_confirm" class="form-control <?= isset($errors['password_confirm']) ? 'is-invalid' : '' ?>"
                       id="repeatPassword" value="<?= $password_confirm ?? '' ?>">
                <div class="invalid-feedback">
					<?= $errors['password_confirm'] ?? '' ?>
                </div>
			</div>
			<div class="col-12">
				<label for="cv" class="form-label">Your CV Link</label>
				<input class="form-control <?= isset($errors['cv_url']) ? 'is-invalid' : '' ?>" name="cv_url" type="text" id="cv"
                       placeholder="https://www.example.com/my-cv" value="<?= $cv_url ?? '' ?>">
                <div class="invalid-feedback">
					<?= $errors['cv_url'] ?? '' ?>
                </div>
			</div>
			<div class="col-12">
				<button type="submit" name="register" class="btn btn-primary">Register</button>
			</div>
		</form>
	</div>
</body>
</html>
