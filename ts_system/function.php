<?php


/**
 * TS Redirect - redirects to another script
 *
 * @param String $path
 * @return void
 */

 class ts 
 {
    public $conn;

    public function ts_redirect($path)
    {
        return header("Location: $path");
    }

    public function __construct()
    {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "teckiting_system";

      // Create connection
      $this->conn = new mysqli($servername, $username, $password, $database);
      
      // Check connection
      if($this->conn->connect_error){
      die("Connection failed :". $this->conn->connect_error);
      }
      return $this->conn;
    }

    // Disconnection database
    public function __destruct()
    {
      return $this->conn->close();
    }

    // Create new User and return ID
    public function create_user($email, $password, $display_name)
    {
      $sql ="INSERT INTO user(display_name, email, password) VALUES ('$display_name', '$email', '$password')";
      $result = $this->conn->query($sql);
      return $this->conn->insert_id;
    }

    // get the user by id 
    public function get_user($id) 
    {
      $sql = "SELECT * FROM user WHERE id = $id";
      $result = $this->conn->query($sql);
      return $result->fetch_object();
    }

    // get the seat by id 
    public function get_seat($id) 
    {
      $sql = "SELECT * FROM seats WHERE id = $id";
      $result = $this->conn->query($sql);
      return $result->fetch_object();
    }

    // for create any number of seats
    public function create_seats($num_of_seats)
    {
      for ($i=1; $i <= $num_of_seats; $i++) { 
        $sql = "INSERT INTO seats(seat_num) VALUES('$i')";
        $result = $this->conn->query($sql);
      }
    }

    // get the seats from database 
    public function get_seats()
    {
      $seats = array();
      $sql = "SELECT * FROM seats";
      $result = $this->conn->query($sql);
      if ($result->num_rows > 0){
      while($row = $result->fetch_object()){
      $seats[] = $row;
      }}
      return $seats;
    }

    // this function for reserve seat 
    public function update_seat_reservation ($id,$status,$user_id)
    {
     // $user_id =!empty($user_id) ? $user_id : "NULL";
      $sql = "UPDATE seats SET is_available=$status, user_id=$user_id WHERE id=$id";
      $resutl = $this->conn->query($sql);

    }

 }

