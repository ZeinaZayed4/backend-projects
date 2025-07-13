<?php

include 'partials/header.php';
require __DIR__ . '/users/users.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$user = getUserById($id);
	
	if (!$user) {
		include 'partials/not_found.php';
		exit();
	}
	
	$errors = [
		'name' => '',
		'username' => '',
		'email' => '',
		'phone' => '',
		'website' => '',
	];
	
} else {
	include 'partials/not_found.php';
	exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user = array_merge($user, $_POST);
	$isValid = validateUser($user, $errors);
	
	if ($isValid) {
		$user = updateUser($_POST, $id);
		uploadImage($_FILES['image'], $user);
		header("Location: index.php");
	}
}

?>

<?php include '_form.php'; ?>

<?php include 'partials/footer.php';
