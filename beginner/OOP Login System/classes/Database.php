<?php

class Database
{
	protected function connect()
	{
		try {
			$host = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'oop';
			return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		} catch (PDOException $e) {
			echo 'Error!: ' . $e->getMessage() . '<br/>';
			die();
		}
	}
}