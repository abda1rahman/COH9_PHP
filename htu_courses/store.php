  <?php 
  session_start();

  $_SESSION['error'] = null;

  if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) // check if the form was submitted using POST method and is not empty
      die("You are a bad guy and you are trying to access this code directly!");

  $title = isset($_POST['title']) ? $_POST['title'] : null;
  $excerpt = isset($_POST['excerpt']) ? $_POST['excerpt'] : null;
  $description = isset($_POST['description']) ? $_POST['description'] : null;
  $is_featured = isset($_POST['is_featured']) ? $_POST['is_featured'] : null;

  $error = false;
  $error_msg = '';







  if (!empty($title) && !empty($excerpt) && !empty($description) && !empty($is_featured)){

    $courses = json_decode(file_get_contents('./api_data/courses.json'));


    $courses[] = (object) array(
    'id'=> count($courses)+1,
    'title' => $title,
    'excerpt' => $excerpt,
    'description' => $description,
    'featured' => !empty($is_featured) ? 1 : 0
    );
    $json_courses = json_encode($courses);
    file_put_contents('./api_data/courses.json', $json_courses);

   // var_dump($courses);
     } else {
    $error_msg = "please fillout the required information correct";
    $error = true; 

     }



  if($error){
  $_SESSION['error'] = $error_msg;

  header('Location: ./create.php');
  }else{
  header('Location: ./all_courses.php');
  } 
