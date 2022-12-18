<?php 
session_start();

$_SESSION['error']=null;

if($_SERVER['REQUEST_METHOD'] != 'POST' && empty($_POST) )
die('your are trying to access from direct link');

$email = isset($_POST['email']) ? $_POST['email'] : null ;
$password = isset($_POST['password']) ? $_POST['password'] : null ;


$error = false;
$error_msg = '';

if(!empty($email) && !empty($password)){


  $vaild_user = null ;

  $users = json_decode(file_get_contents('./api/users.json'));

  foreach ($users as $user) {
      if($user->mail == $_POST['email']){
        $vaild_user = $user; 
        break;
      }
      }
 
  if(!empty($vaild_user)){
    if($password != $vaild_user->pass){
      $error = true ;
      $error_msg = 'password is uncorrect';
    }
  }else{
    $error = true ;
    $error_msg = 'email is wrong';
  }

}else{
  $error = true;
  $error_msg = 'you should enter the email and password';
}

if($error){
  $_SESSION['error'] = $error_msg;
  header('Location: ./');
}else {
  $_SESSION['user'] = array(
    'username' => $vaild_user->name
  );
 header('Location:./home.php');
}

