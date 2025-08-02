<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$todoName = $_POST['todo_name'];
	$json = file_get_contents('todo.json');
	$json_array = json_decode($json, true);
	
	if (in_array($todoName, array_keys($json_array))) {
		$json_array[$todoName]['completed'] = !($json_array[$todoName]['completed']);
		file_put_contents('todo.json', json_encode($json_array, JSON_PRETTY_PRINT));
		header("Location: index.php");
	}
}

header("Location: index.php");
