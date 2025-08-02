<?php

class Signup extends Database
{
	protected function setUser(string $username, string $email, string $password)
	{
		$stmt = $this->connect()->prepare('INSERT INTO `users_oop` (`username`, `email`, `password`) VALUES (?, ?, ?)');
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		if (! $stmt->execute([$username, $email, $hashedPassword])) {
			$stmt = null;
			header('Location: ../signup.php?error=stmtFailed');
			exit();
		}
	}
	
	protected function checkUser(string $username, string $email)
	{
		$stmt = $this->connect()->prepare('SELECT `username` FROM `users_oop` WHERE users_oop.`username` = ? OR `email` = ?');
		
		if (! $stmt->execute([$username, $email])) {
			$stmt = null;
			header('Location: ../signup.php');
			exit();
		}
		
		return ($stmt->rowCount() > 0);
	}
}