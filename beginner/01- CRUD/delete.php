<?php

include 'partials/header.php';
require __DIR__ . '/users/users.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	deleteUser($id);
	header("Location: index.php");
} else {
	include 'partials/not_found.php';
	exit();
}
