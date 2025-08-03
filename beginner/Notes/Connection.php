<?php

class Connection
{
	public PDO $pdo;
	public function __construct()
	{
		$this->pdo = new PDO('mysql:host=localhost;dbname=notes', 'root', '');
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function getNotes(): array|false
	{
		$statement = $this->pdo->prepare('SELECT * FROM `notes` ORDER BY `created_at` DESC');
		$statement->execute();
		
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function addNote($note): bool
	{
		$statement = $this->pdo->prepare('INSERT INTO `notes` (title, description) VALUES (?, ?)');
		
		return $statement->execute([$note['title'], $note['description']]);
	}
	
	public function getNoteById($id): array|false
	{
		$statement = $this->pdo->prepare('SELECT * FROM `notes` WHERE `id` = ?');
		$statement->execute([$id]);
		
		return $statement->fetch(PDO::FETCH_ASSOC);
	}
	
	public function updateNote($id, $note): bool
	{
		$statement = $this->pdo->prepare('UPDATE `notes` SET `title` = ?, `description` = ? WHERE `id` = ?');
		
		return $statement->execute([$note['title'], $note['description'], $id]);
	}
	
	public function deleteNote($id): bool
	{
		$statement = $this->pdo->prepare('DELETE FROM `notes` WHERE `id` = ?');
		
		return $statement->execute([$id]);
	}
}
