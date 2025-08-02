<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$todo_name = trim(htmlspecialchars($_POST['todo_name']));
	
	if ($todo_name) {
		if (file_exists('todo.json')) {
			$json = file_get_contents('todo.json');
			$json_array = json_decode($json, true);
		} else {
			$json_array = [];
		}
		
		$json_array[$todo_name] = ["completed" => false];
		file_put_contents('todo.json', json_encode($json_array, JSON_PRETTY_PRINT));
	}
	header("Location: index.php");
}

header("Location: index.php");
