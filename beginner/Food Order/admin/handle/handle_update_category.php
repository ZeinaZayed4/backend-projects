<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$current_image = $_POST['current_image'];
	$title = trim(htmlspecialchars($_POST['title']));
	$featured = $_POST['featured'];
	$active = $_POST['active'];
	
	if (! empty($_FILES['image']['name'])) {
		$image = $_FILES['image'];
		$image_name = $image['name'];
		$tmp_name = $image['tmp_name'];
		$ext = pathinfo($image_name, PATHINFO_EXTENSION);
		$new_image_name = 'food_category_' . uniqid() . '.' . $ext;
		$path = "../uploads/$new_image_name";
		$uploaded = move_uploaded_file($tmp_name, $path);
		
		if (! $uploaded) {
			$_SESSION['error'] = "Can't update image";
			header('Location: ../update_category.php');
			exit();
		}
		
		if (! empty($current_image)) {
			if (! unlink("../uploads/$current_image")) {
				$_SESSION['error'] = 'Failed to remove current image';
				header('Location: ../manage_category.php');
				exit();
			}
		}
	} else {
		$new_image_name = $current_image;
	}
	
	$query = "UPDATE `categories` SET
                        `title` = '$title',
                        `image_name` = '$new_image_name',
                        `featured` = '$featured',
                        `active` = '$active'
                    WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Category updated successfully';
	} else {
		$_SESSION['error'] = 'Failed to update category';
	}
	header('Location: ../manage_category.php');
	exit();
} else {
	header('Location: ../update_category.php');
}
