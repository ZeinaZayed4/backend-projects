<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$title = trim(htmlspecialchars($_POST['title']));
	$featured = trim(htmlspecialchars($_POST['featured']));
	$active = trim(htmlspecialchars($_POST['active']));
	
	if (! empty($_FILES['image']['name'])) {
		$image = $_FILES['image'];
		$image_name = $image['name'];
		$tmp_name = $image['tmp_name'];
		$ext = pathinfo($image_name, PATHINFO_EXTENSION);
		$new_image_name = 'food_category_' . uniqid() . '.' . $ext;
		$path = "../uploads/$new_image_name";
		$uploaded = move_uploaded_file($tmp_name, $path);
		
		if (! $uploaded) {
			$_SESSION['error'] = "Can't upload image";
			header('Location: ../add_category.php');
			exit();
		}
	} else {
		$new_image_name = "";
	}
	
	$query = "INSERT INTO `categories` (`title`, `image_name`, `featured`, `active`) VALUES ('$title', '$new_image_name', '$featured', '$active')";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Category added successfully';
		header('Location: ../manage_category.php');
	} else {
		$_SESSION['error'] = 'Failed to add category';
		header('Location: ../add_catgory.php');
	}
	exit();
} else {
	header('Location: ../add_category.php');
}
