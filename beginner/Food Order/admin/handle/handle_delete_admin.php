<?php

require_once '../../config/constants.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$query = "DELETE FROM `admins` WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Admin deleted successfully';
		header('Location: ../manage_admin.php');
	} else {
		$_SESSION['error'] = 'Failed to delete admin!';
		header('Location: ../manage_admin.php');
		exit();
	}
} else {
	header('Location: ../manage_admin.php');
}
