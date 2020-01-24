<?php

error_reporting(E_ALL);
header('Content-type: application/json');
require_once '../week-19-php/dbConn.class.php';

$conn = dbConn::getInstance();
$name = $_POST['username'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$email = isset($_POST['email']) ? $_POST['email'] : NULL;

$query = "INSERT INTO users (user_name, pass_hash, email) VALUES ('$name', '$pass', '$email')";

$result = $conn->query($query);

echo !$result ? "fail" : "success";
