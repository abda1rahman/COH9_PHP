<?php include "./header.php";
$course_id = isset($_GET['id']) ? $_GET['id'] : null ;

if(!empty($course_id)) :
  
$courses = json_decode(file_get_contents('./api_data/courses.json'));
// $course;
// foreach ($courses as $current_course){
//   if($course_id == $current_course->id){
//   $course = $current_course;
//   break;
//   }
// }

// second solution (pro)
$course = array_filter($courses, function ($item) use ($course_id){
 return $item->id == $course_id;
});
$course =$course[array_key_first($course)];



?>

<div class="container my-5 py-5">
  <div class="row">
    <div class="col">
      <img src="./assets/images/c1.jpeg" alt="PHP Course">
    </div>
    <div class="col">
      <h2>
        <?= $course->title ?>
      </h2>
      <p>
      <?= $course->description ?>
      </p>
      <p>
        <?= $course->featured ? "this course is featured" : "This course is not featured" ?>
      </p>
    </div>
  </div>

  <?php else :?>

    <div class="container my-5 py-5">
  <div class="row">
    <div class="col">
      <p>
        <p class="text-center"> No course was found</p>
      </p>
    </div>
  </div>

  <?php
  endif;
  include "./footer.php" ?>