<?php
  class shippedCounter{
    private $db;

    public function __construct(){
      require_once 'week-19-php/dbConn.class.php';
      $this->db = dbConn::getInstance();
    }

    public function getNumShipped(){
      //return $this->db->testConnection();
      $result = $this->db->query('SELECT COUNT(*) FROM orders WHERE status = "Shipped";');
      return "Total items shipped: " . $result->fetch_row()[0];
    }
  }
?>
