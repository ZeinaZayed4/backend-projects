<?php

class LoginController extends Login
{
	private string $email;
	private string $password;
	
	public function __construct(string $email, string $password)
	{
		$this->email = $email;
		$this->password = $password;
	}
	
	public function loginUser()
	{
		if ($this->emptyInput()) {
//			echo 'Empty input!';
			header("Location: ../signup.php?error=emptyInput");
			exit();
		} elseif ($this->invalidEmail()) {
//			echo 'Invalid email!';
			header("Location: ../signup.php?error=email");
			exit();
		}
		
		$this->getUser($this->email, $this->password);
	}
	
	private function emptyInput(): bool
	{
		return (empty($this->email) || empty($this->password));
	}
	
	private function invalidEmail(): bool
	{
		return (! filter_var($this->email, FILTER_VALIDATE_EMAIL));
	}
}