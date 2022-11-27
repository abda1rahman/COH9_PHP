<?php 
include './header.php';

$all_courses = json_decode(file_get_contents('./api_data/courses.json'));

$search_term = !empty($_GET['s']) ? $_GET['s'] : null ;
$final_courses = array();


foreach ($all_courses as $course) {
  if(strpos($course->description, $search_term) !== false){
    $final_courses[] = $course;
  }    
}


?>

<main class="container my-5">
    <h1 class="text-center">You Are Search for "<?= $search_term ?>"</h1>
    <hr class="mx-auto w-50">
    <div id="htu-courses-warpper" class=" row">

      <?php if(!empty($final_courses)){?> 

      <?php  foreach ($final_courses as $course) : ?>

      <div class="htu-card-warpper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="card">
          <img src="./assets/images/c1.jpeg" class="card-img-top" alt="image courses php">
          <div class="card-body">
            <h5 class="card-title"><?= $course->title ?></h5>
            <p class="card-text"> <?= $course->excerpt ?> </p>
            <a href="#" class="btn btn-primary">Enroll Now</a></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php  } else{?>
      <p class="d-flex justifiy-content-center"<?php echo ">Nothing was found!</p>";
    }
    
    ?>

<?php include './footer.php' ?>