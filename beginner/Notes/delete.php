<?php

require_once 'Connection.php';

$connection = new Connection();

$connection->deleteNote($_POST['id']);

header('Location: index.php');
