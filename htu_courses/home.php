
<?php  require './header.php';

$courses = json_decode(file_get_contents('./api_data/courses.json'));

?>
<main class="container my-5">
    <h1 class="text-center">Top Courses</h1>
    <hr class="mx-auto w-50">

    <div id="htu-courses-warpper" class=" row">
      <?php  foreach ($courses as $course) :
        if(!$course->featured)
        continue;
       ?>
      <div class="htu-card-warpper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="card">
          <img src="./assets/images/c1.jpeg" class="card-img-top" alt="image courses php">
          <div class="card-body">
            <h5 class="card-title"><?= $course->title ?></h5>
            <p class="card-text"> <?= $course->excerpt ?> </p>
            <a href="./course.php?id=<?= $course->id ?>" class="btn btn-primary">Enroll Now</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </main>
  <?php  require './footer.php' ?>