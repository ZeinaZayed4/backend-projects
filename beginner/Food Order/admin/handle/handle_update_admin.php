<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$full_name = trim(htmlspecialchars($_POST['full_name']));
	$username = trim(htmlspecialchars($_POST['username']));
	
	$query = "UPDATE `admins` SET `full_name` = '$full_name', `username` = '$username' WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Admin updated successfully';
		header('Location: ../manage_admin.php');
	} else {
		$_SESSION['success'] = 'Failed to update admin';
		header('Location: ../update_admin.php');
	}
} else {
	header('Location: ../manage_admin.php');
}
