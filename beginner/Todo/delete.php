<?php

//echo '<pre>';
//var_dump($_POST);
//echo '</pre>';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$todoName = $_POST['todo_name'];
	$json = file_get_contents('todo.json');
	$json_array = json_decode($json, true);
	
	if (in_array($todoName, array_keys($json_array))) {
		unset($json_array[$todoName]);
		file_put_contents('todo.json', json_encode($json_array, JSON_PRETTY_PRINT));
		header("Location: index.php");
	}
}

header("Location: index.php");
