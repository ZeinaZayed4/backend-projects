<?php

session_start();

//const URL = 'http://backend.test/beginner/Food%20Order/';
const LOCALHOST = 'localhost';
const USERNAME = 'root';
const  PASSWORD = '';
const DBNAME = 'food_order';

$conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DBNAME);
