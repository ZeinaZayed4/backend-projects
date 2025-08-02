<?php

class SignupController extends Signup
{
	private string $username;
	private string $email;
	private string $password;
	private string $repeat_password;
	
	public function __construct(string $username, string $email, string $password, string $repeat_password)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->repeat_password = $repeat_password;
	}
	
	public function signupUser()
	{
		if ($this->emptyInput()) {
//			echo 'Empty input!';
			header("Location: ../signup.php?error=emptyInput");
			exit();
		} elseif ($this->invalidUsername()) {
//			echo 'Invalid username!';
			header("Location: ../signup.php?error=username");
			exit();
		} elseif ($this->invalidEmail()) {
//			echo 'Invalid email!';
			header("Location: ../signup.php?error=email");
			exit();
		} elseif ($this->passwordMatch()) {
//			echo 'Passwords do not match!';
			header("Location: ../signup.php?error=passwordMatch");
			exit();
		} elseif ($this->usernameTakenCheck()) {
//			echo 'Username or email is taken!';
			header("Location: ../signup.php?error=userOrEmailTaken");
			exit();
		}
		
		$this->setUser($this->username, $this->email, $this->password);
	}
	
	private function emptyInput(): bool
	{
		return (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->repeat_password));
	}
	
	private function invalidUsername(): bool
	{
		return (! preg_match('/^[a-zA-Z0-9]*$/', $this->username));
	}
	
	private function invalidEmail(): bool
	{
		return (! filter_var($this->email, FILTER_VALIDATE_EMAIL));
	}
	
	private function passwordMatch(): bool
	{
		return ($this->password !== $this->repeat_password);
	}
	
	private function usernameTakenCheck(): bool
	{
		return ($this->checkUser($this->username, $this->email));
	}
}