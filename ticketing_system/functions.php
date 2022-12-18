<?php

use FTP\Connection;

/**
 * TS Redirect - redirects to another script
 *
 * @param String $path
 * @return void
 */
function ts_redirect($path)
{
    header("Location: $path");
    exit();
}


function connect()
{
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "teckiting_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: ". mysqli_connect_errno());
}

return $conn;
}

function create_seats($num_of_seat)
{
    for ($i=1; $i <= $num_of_seat; $i++) { 
        $connection = connect();
        $sql = "INSERT INTO seats (seat_num) VALUES ($i) "; 
        mysqli_query($connection, $sql);
        mysqli_close($connection);
      }
      
}

function create_user($email, $password, $display_name)
{
    $connection = connect();
    $id=0;
    $sql = "INSERT INTO users (email, password, display_name) VALUES ('$email', '$password', '$display_name')";
    $result = mysqli_query($connection, $sql);
    return $connection->insert_id;
}

function get_user($id)
{
    $connection = connect();
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    return mysqli_fetch_object($result);
}

function get_seats()
{
    $seats = array();
    $connection = connect();
    $sql = "SELECT * FROM seats";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_object($result)) {
            $seats[] = $row;
        }
    }
    mysqli_close($connection);
    return $seats;
}