<?php
  error_reporting(E_ALL);
  header('Content-type: application/json');
  require_once 'dbConn.class.php';

  $conn = dbConn::getInstance();
  if(!$conn){
    echo 'connection failed';
  }
  
  $custID = $_GET['custID'];

  if(!isset($custID)){
    echo 'Cannot query without pkey custID';
  }

  $result = $conn->query("SELECT * FROM customers WHERE custID = '$custID'");
  if(!$result){
    echo 'No customer exists with specified ID.';
  }

  $customer = $result->fetch_assoc();
  if(!$customer){
    echo 'No result';
  }

  echo json_encode($customer);
?>
