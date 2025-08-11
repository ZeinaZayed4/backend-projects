<?php

session_start();
require_once '../../config/constants.php';

if (isset($_GET['id']) && isset($_GET['image_name'])) {
	$id = $_GET['id'];
	$image_name = $_GET['image_name'];
	
	if (! empty($image_name)) {
		$path = "../uploads/$image_name";
		
		if (! unlink($path)) {
			$_SESSION['error'] = 'Failed to delete the image';
			header('Location: ../manage_category.php');
			exit();
		}
	}
	
	$query = "DELETE FROM `categories` WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Category deleted successfully';
	} else {
		$_SESSION['error'] = 'Failed to delete category';
	}
	header('Location: ../manage_category.php');
	exit();
} else {
	header('Location: ../manage_category.php');
}
