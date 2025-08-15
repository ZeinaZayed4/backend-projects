<?php

session_start();
require_once '../config/constants.php';

if (isset($_POST['submit'])) {
	$food_title = trim($_POST['food_title']);
	$food_price = $_POST['food_price'];
	$quantity = $_POST['quantity'];
	$fullName = trim($_POST['full_name']);
	$phone = trim($_POST['phone']);
	$email = trim($_POST['email']);
	$address = trim($_POST['address']);
	$total = $food_price * $quantity;
	
	$query = "INSERT INTO `orders`(`food`, `price`, `quantity`, `total`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`)
			  VALUES ('$food_title', '$food_price', $quantity, $total, '$fullName', '$phone', '$email', '$address')";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Food ordered successfully';
		header('Location: ../index.php');
		exit();
	} else {
		$_SESSION['error'] = 'Failed to order food';
		header('Location: ../index.php');
		exit();
	}
} else {
	header('Location: ../order.php');
	exit();
}
