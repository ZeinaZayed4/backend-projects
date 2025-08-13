<?php

session_start();
require_once '../../config/constants.php';

if (isset($_GET['id']) && isset($_GET['image_name'])) {
	$id = $_GET['id'];
	$image_name = $_GET['image_name'];
	
	if (! empty($image_name)) {
		$path = "../uploads/food/$image_name";
		
		if (! unlink($path)) {
			$_SESSION['error'] = 'Failed to delete image';
			header('Location: ../manage_food.php');
			exit();
		}
	}
	
	$query = "DELETE FROM `food` WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Food deleted successfully';
	} else {
		$_SESSION['error'] = 'Failed to delete food';
	}
	header('Location: ../manage_food.php');
	exit();
} else {
	header('Location: ../manage_food.php');
	exit();
}
