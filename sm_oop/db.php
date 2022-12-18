<?php 

class DB
{
  public $conn;

  public function __construct()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "coh9_php";

    // Create connection
    $this->conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if($this->conn->connect_error){
      die('Connection failed: '. $this->conn->connect_error); 
    }
    return $this->conn ;
  }

  public function __destruct()
  {
    $this->conn->close();
  }

  public function send_query($sql)
  {
    return $this->conn->query($sql);
  }
}