  <?php 
  session_start();

  $_SESSION['error'] = null;

  if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) // check if the form was submitted using POST method and is not empty
      die("You are a bad guy and you are trying to access this code directly!");

  $password = isset($_POST['password']) ? $_POST['password'] : null;

  $error = false;
  $error_msg = '';







  if (!empty($email) && !empty($password)){

      $vaild_user = null;

      $users = file_get_contents('../api_data/users.json'); // this varible will contain all the users in the DB.
      $users = json_decode($users); // convert the json string to php object 

      // loop though the users
      foreach ($users as $user) {
        //check if the current user email equals the provided email
        if($email == $user->email){
          $vaild_user = $user;  // assign the found user to a variable
          break; // break the loop since we found a valid user 
      }
      }
    if(!empty($vaild_user)){
      if($password != $vaild_user->password){
        $error_msg = "Incorrect  password";
        $error = true;
       
      }
    }else{
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
  }else{
  $_SESSION['user'] = array(
    'display_name' => $vaild_user->display_name
  );
  header('Location: ../home.php');
  } 
