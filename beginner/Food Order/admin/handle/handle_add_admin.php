<?php

require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$full_name = trim(htmlspecialchars($_POST['full_name']));
	$username = trim(htmlspecialchars($_POST['username']));
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
	$query = "INSERT INTO `admins` SET
		 `full_name` = '$full_name',
		 `username` = '$username',
		 `password` = '$password'
    ";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = "Admin added successfully";
		header("Location: ../manage_admin.php");
	} else {
		$_SESSION['error'] = "Failed to add admin";
		header("Location: ../add_admin.php");
	}
} else {
	header("Location: ../add_admin.php");
}

