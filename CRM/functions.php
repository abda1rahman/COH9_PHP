<?php 

function connect()
{
  $servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "coh9_php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: ". mysqli_connect_errno());
}

return $conn;
}

function get_customers()
{
  $sql = "SELECT * FROM customers";
$result = mysqli_query(connect(), $sql);

// $first_row = mysqli_fetch_assoc($result);
// $second_row = mysqli_fetch_assoc($result);
// $third_row = mysqli_fetch_assoc($result);
$customers = array();

if(mysqli_num_rows($result) > 0){
  while ($row = mysqli_fetch_assoc($result)){
    $customers[] = $row;
  }
}
return $customers;
}


  function get_customer($id)
  {
    $sql = "SELECT * FROM customers WHERE id=$id";
    $result = mysqli_query(connect(), $sql);
    
    // $first_row = mysqli_fetch_assoc($result);
    // $second_row = mysqli_fetch_assoc($result);
    // $third_row = mysqli_fetch_assoc($result);
    $customer = null;
    
    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        $customer = $row;
      }
    }
    return $customer;
  }
