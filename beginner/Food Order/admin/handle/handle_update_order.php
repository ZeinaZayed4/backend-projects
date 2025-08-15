<?php

session_start();
require_once '../../config/constants.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$status = $_POST['status'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$total = $quantity * $price;
	
	$query = "UPDATE `orders` SET
                    `quantity` = $quantity,
                    `status` = '$status',
                    `total` = $total,
                    `customer_name` = '$name',
                    `customer_contact` = '$phone',
                    `customer_email` = '$email',
                    `customer_address` = '$address'
             WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Order updated successfully';
	} else {
		$_SESSION['error'] = 'Failed to update order';
	}
	header('Location: ../manage_order.php');
	exit();
} else {
	header('Location: ../update_order.php');
	exit();
}
