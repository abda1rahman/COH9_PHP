  <?php 
  session_start();

  $_SESSION['error'] = null;

  if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) // check if the form was submitted using POST method and is not empty
      die("You are a bad guy and you are trying to access this code directly!");

  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $password = isset($_POST['password']) ? $_POST['password'] : null;

  $error = false;
  $error_msg = '';

  $db_email = 'test@12';
  $db_password = '1234';

  if (!empty($email) && !empty($password)){
  if ($email == $db_email) {


      if($password != $db_password){
        $error_msg = "Incorrect  password";
        $error = true;
       
      } 
      }else {
      $error_msg = "email";
      $error = true;
     }
     } else {
    $error_msg = "please fillout the required information correct";
    $error = true; 

     }



  if($error){
  $_SESSION['error'] = $error_msg;

  header('Location: ../');
  exit();
  }else{
  $_SESSION['user'] = array('email' => $email);
  header('Location: ./home.php');
  exit();
  } 
