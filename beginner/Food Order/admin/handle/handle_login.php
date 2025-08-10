<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$username = trim(htmlspecialchars($_POST['username']));
	$password = $_POST['password'];
	
	$query = "SELECT * FROM `admins` WHERE `username` = '$username'";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) === 1) {
		$admin = $result->fetch_assoc();
		$saved_password = $admin['password'];
		$is_verified = password_verify($password, $saved_password);
		
		if ($is_verified) {
			$_SESSION['success'] = "Welcome {$admin['full_name']}!";
			$_SESSION['admin_id'] = $admin['id'];
			header('Location: ../index.php');
			exit();
		} else {
			$_SESSION['error'] = 'Wrong username or password';
			header('Location: ../login.php');
			exit();
		}
	} else {
		$_SESSION['error'] = 'User not found';
		header('Location: ../login.php');
		exit();
	}
} else {
	header('Location: ../login.php');
	exit();
}
