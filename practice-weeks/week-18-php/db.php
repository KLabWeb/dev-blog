<?php
  require_once 'login.php';

  //returns mysqli object with various access, etc. methods
  $conn = new mysqli($host, $user, $pass, $db);

  $conn->connect_error && die('Fatal DB connection error');

  $result = $conn->query('SELECT * FROM classics');

  !result && die("Query failed.");
?>
