<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
	$username = trim(htmlspecialchars($_POST['username']));
	$email = trim(htmlspecialchars($_POST['email']));
	$password = trim(htmlspecialchars($_POST['password']));
	$repeat_password = trim(htmlspecialchars($_POST['repeat_password']));
	
	require_once '../classes/Database.php';
	require_once '../classes/Signup.php';
	require_once '../classes/SignupController.php';
	
	$signup = new SignupController($username, $email, $password, $repeat_password);
	
	$signup->signupUser();
	
	header('Location: ../login.php');
} else {
	header('Location: ../signup.php?error=submitForm');
}
