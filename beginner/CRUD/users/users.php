<?php

function getUsers(): array
{
	return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id): mixed
{
	$users = getUsers();
	
	foreach ($users as $user) {
		if ($user['id'] == $id) {
			return $user;
		}
	}
	
	return null;
}

function createUser($data)
{
	$users = getUsers();
	$data['id'] = rand(1000000, 2000000);
	$users[] = $data;
	putJson($users);
	return $data;
}

function updateUser($data, $id): array
{
	$updateUser = [];
	$users = getUsers();
	
	foreach ($users as $idx => $user) {
		if ($user['id'] == $id) {
			$users[$idx] = $updateUser = array_merge($user, $data);
		}
	}
	
	putJson($users);
	return $updateUser;
}

function deleteUser($id): void
{
	$users = getUsers();
	
	foreach ($users as $i => $user) {
		if ($user['id'] == $id) {
			array_splice($users, $i, 1);
		}
	}
	putJson($users);
}

function uploadImage($file, $user): void
{
	if (isset($_FILES['image']) && $_FILES['image']['name']) {
		if (!is_dir(__DIR__ . "/images")) {
			mkdir(__DIR__ . "/images");
		}
		
		$imageName = $file['name'];
		$extension = pathinfo($imageName, PATHINFO_EXTENSION);
		
		move_uploaded_file($file['tmp_name'], __DIR__ . "/images/{$user['id']}.$extension");
		$user['extension'] = $extension;
		updateUser($user, $user['id']);
	}
}

function putJson($users): void
{
	file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors): bool
{
	$isValid = true;
	
	if (!$user['name']) {
		$isValid = false;
		$errors['name'] = 'Name is required';
	}
	if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
		$isValid = false;
		$errors['username'] = 'Username is required and it must be between 6 and 16 characters';
	}
	if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
		$isValid = false;
		$errors['email'] = 'Invalid email format';
	}
	if (!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
		$isValid = false;
		$errors['phone'] = 'Invalid phone number';
	}
	
	return $isValid;
}
