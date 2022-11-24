<?php
session_start();


$_SESSION['error'] = null;

// username should be between 5 and 10 chars.

if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

 // var_dump($_SESSION);
// var_dump($_POST);


$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$error = false;
$error_msg = '';

$db_username = 'test12';
$db_password = '1234';
// check username
if (!empty($username) && !empty($password)) {
    if (strlen($username) > 5 && strlen($username) < 10) {
    // proceed and check if the username is correct
      if($username != $db_username ){
        $error_msg = "Incorrent username or password";
        $error = true ; 
      }

    }} else {
  
        $error_msg = "Username should be between 5 and 10 Chars";
        $error = true ; 
    }


// check username
if (strlen($username) > 5 && strlen($username) < 10) {
  // proceed and check if the username is correct 
  if ($username == $db_username) {
      if($password != $db_password){
         $error_msg = "Incorrect password";
         $error = true;
  }
  } else {
      $error_msg = "Incorrect username";
      $error = true;
  }
  }else {
    $error_msg = "Username should be between 5 and 10 Chars";
    $error = true;
  }



if($error){
  $_SESSION['error'] = $error_msg;
  
  header('Location: ./');
  exit();
}else{
  $_SESSION['user'] = array('username' => $username);
  header('Location: ./home.php');
  exit();
} 
