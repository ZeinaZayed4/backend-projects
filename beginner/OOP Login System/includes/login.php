<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
	$email = trim(htmlspecialchars($_POST['email']));
	$password = trim(htmlspecialchars($_POST['password']));
	
	require_once '../classes/Database.php';
	require_once '../classes/Login.php';
	require_once '../classes/LoginController.php';
	
	$login = new LoginController($email, $password);
	
	$login->loginUser();
	
	header('Location: ../index.php');
} else {
	header('Location: ../login.php?error=submitForm');
}
