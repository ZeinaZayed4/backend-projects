<?php

require_once 'Connection.php';

$connection = new Connection();

$id = $_POST['id'] ?? '';

if ($id) {
	$connection->updateNote($id, $_POST);
} else {
	$connection->addNote($_POST);
}

header('Location: index.php');
