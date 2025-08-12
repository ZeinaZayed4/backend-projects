<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$title = trim($_POST['title']);
	$description = trim($_POST['description']);
	$price = $_POST['price'];
	$featured = trim($_POST['featured']);
	$active = trim($_POST['active']);
	$category_id = $_POST['category'];
	
	if (! empty($_FILES['image']['name'])) {
		$image = $_FILES['image'];
		$image_name = $image['name'];
		$tmp_name = $image['tmp_name'];
		$ext = pathinfo($image_name, PATHINFO_EXTENSION);
		$new_image_name = 'food_' . uniqid() . '.' . $ext;
		$path = "../uploads/food/$new_image_name";
		$uploaded = move_uploaded_file($tmp_name, $path);
		
		if (! $uploaded) {
			$_SESSION['error'] = "Can't upload image";
			header('Location: ../add_food.php');
			exit();
		}
	} else {
		$new_image_name = "";
	}
	
	$query = "INSERT INTO `food`(`title`, `description`, `price`, `featured`, `active`, `category_id`, `image_name`)
			  VALUES ('$title', '$description', $price, '$featured', '$active', $category_id, '$new_image_name')";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = "Food added successfully";
		header('Location: ../manage_food.php');
	} else {
		$_SESSION['error'] = "Failed to add food";
		header('Location: ../add_food.php');
	}
	exit();
} else {
	header('Location: ../add_food.php');
	exit();
}
