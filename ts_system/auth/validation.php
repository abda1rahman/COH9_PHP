<?php
session_start();
include "../function.php";

$_SESSION['error'] = null;

if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$error = false;
$error_msg = '';

$ts = new ts();


if (!empty($email) && !empty($password)) {

    $sql ="SELECT * FROM user WHERE email='$email'";
    $result = $ts->conn->query($sql);
    $user = $result->fetch_object();
    
     
    if (!empty($user)) {
        if ($password != $user->password) {
            $error_msg = "Incorrect email or password22";
            $error = true;
        }
    } else {
        $error_msg = "Incorrect email or password11";
        $error = true;
    }
} else {
    $error_msg = "Please fillout the required information";
    $error = true;
}


if($error){
$_SESSION['error'] = $error_msg;
$ts->ts_redirect('../');
}else{
    $_SESSION['user'] = array(
    'display_name' => $user->display_name,
    'is_admin' => $user->is_admin,
    'user_id' => $user->id
    );
    $ts->ts_redirect('../home.php');
}
