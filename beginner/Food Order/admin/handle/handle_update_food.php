<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$current_image = $_POST['current_image'];
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
			$_SESSION['error'] = "Can't update image";
			header('Location: ../update_food.php');
			exit();
		}
		
		if (! empty($current_image)) {
			if (! unlink("../uploads/food/$current_image")) {
				$_SESSION['error'] = 'Failed to remove current image';
				header('Location: ../manage_food.php');
				exit();
			}
		}
	} else {
		$new_image_name = $current_image;
	}
	
	$query = "Update `food` SET
                  `title` = '$title',
                  `description` = '$description',
                  `price` = '$price',
                  `image_name` = '$new_image_name',
                  `category_id` = $category_id,
                  `featured` = '$featured',
                  `active` = '$active'
			  WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Food updated successfully';
		header('Location: ../manage_food.php');
	} else {
		$_SESSION['error'] = 'Failed to update food';
		header('Location: ../update_food.php');
	}
	exit();
} else {
	header('Location: ../update_food.php');
	exit();
}
