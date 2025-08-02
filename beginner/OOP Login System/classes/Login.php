<?php

class Login extends Database
{
	protected function getUser(string $email, string $password)
	{
		$stmt = $this->connect()->prepare('SELECT * FROM `users_oop` WHERE `email` = ?');
		
		if (! $stmt->execute([$email])) {
			$stmt = null;
			header('Location: ../login.php?error=stmtFailed');
			exit();
		}
		
		if ($stmt->rowCount() === 0) {
			$stmt = null;
			header('Location: ../login.php?error=userNotFound');
			exit();
		}
		
		$user = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
		$check_password = password_verify($password, $user['password']);
		
		if (! $check_password) {
			$stmt = null;
			header('Location: ../login.php?error=wrongEmailOrPassword');
			exit();
		}
		
		session_start();
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['username'] = $user['username'];
	}
}