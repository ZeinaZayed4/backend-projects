<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$current_password = $_POST['current_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	
	$query = "SELECT * FROM `admins` WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) === 1) {
		$old_password = mysqli_fetch_assoc($result)['password'];
		$is_verified = password_verify($current_password, $old_password);
		
		if ($is_verified) {
			if ($new_password === $confirm_password) {
				$new_password = password_hash($new_password, PASSWORD_DEFAULT);
				
				$query = "UPDATE `admins` SET `password` = '$new_password' WHERE `id` = $id";
				$result = mysqli_query($conn, $query);
				
				if ($result) {
					$_SESSION['success'] = "Password changed successfully";
					header('Location: ../manage_admin.php');
				} else {
					$_SESSION['error'] = "Failed to change password";
					header('Location: ../update_password.php?id=' . $id);
				}
			} else {
				$_SESSION['error'] = "Passwords don't match";
				header('Location: ../update_password.php?id=' . $id);
			}
		} else {
			$_SESSION['error'] = 'Wrong password';
			header('Location: ../update_password.php?id=' . $id);
		}
	} else {
		$_SESSION['error'] = 'User not found';
		header('Location: ../update_password.php?id=' . $id);
	}
} else {
	header('Location: ../update_password.php?id=' . $id);
}
