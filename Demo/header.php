<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Animal Zoo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Animal Zoo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse" id="navbarNav">
          <?php if (isset($_SESSION['user'])) : ?>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">All Animal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">Contact Us</a>
              </li>
            </ul>
            <div class="">
              <span class=""><?= $_SESSION['user']['username'] ?></span>
              <a href="./logout.php" class="btn btn-danger">Logout</a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <style>
      body {
        height: 100vh;
      }

      header {
        height: 60vh;
        background-image: url(https://animals.sandiegozoo.org/sites/default/files/2018-07/animals_hero_kangaroopaw.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }

      footer {
        color: white;
      }
    </style>

    <div class="container my-5" id="animal-page">
      <div>
        <!-- <img class="" src="https://animals.sandiegozoo.org/sites/default/files/2018-07/animals_hero_kangaroopaw.jpg"> -->
      </div>
    </div>
  </header>

  <div class="container w-50 my-3 ">
    <h1 class="text-center">Animal Zoo</h1>
    <hr>
  </div>