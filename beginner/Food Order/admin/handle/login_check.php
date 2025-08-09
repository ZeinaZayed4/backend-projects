<?php

if (! isset($_SESSION['admin_id'])) {
	$_SESSION['error'] = 'Login first to access admin dashboard';
	
	header('Location: login.php');
	exit();
}
