<?php session_start(); require_once 'handle/login_check.php' ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Food Order Website - Home Page</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<!-- Menu Section Starts -->
	<div class="menu text-center">
		<div class="wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="manage_admin.php">Admin</a></li>
				<li><a href="manage_category.php">Category</a></li>
				<li><a href="manage_food.php">Food</a></li>
				<li><a href="manage_order.php">Order</a></li>
				<li><a href="handle/handle_logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<!-- Menu Section Ends -->
