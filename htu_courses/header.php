<?php
session_start();
include './includes/env.php';

// first solution
// $current_file = explode('/',$_SERVER['SCRIPT_FILENAME']);
// $current_file_name = $current_file[array_key_last($current_file)];

if(!isset($_SESSION['user']) && !strpos($_SERVER['SCRIPT_FILENAME'], 'index.php'))
  header("Location: ./")

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= TITLE ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body>

  <header>

   <?php if(isset($_SESSION['user'])) : ?>
    <style>
        header{
        height: 70vh;
        background-image:  url('./assets/images/home_bg.jpeg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
      } 
    </style>
      <?php else : ?>
        <style>
          body{
              height:100vh !important;
            }

          footer{
            position:absolute;
            bottom: 0;
            width:100vw;
          }
        </style>
      <?php endif; ?>


    <nav class="navbar navbar-expand-lg bg-light px-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="./"><?= TITLE ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php if ( isset($_SESSION['user'])) : 
           $title_list = json_decode(file_get_contents('./api_data/menu.json'));
           ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php foreach ($title_list as $title_nav) : ?>
            <li class="nav-item">
              <a class="nav-link <?= strpos($_SERVER['SCRIPT_FILENAME'], $title_nav->script_name) ? "active" : null ?>" aria-current="page" href="<?= $title_nav->script_name ?>"><?= $title_nav->title ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        <div >
          <span class="me-3"><?= $_SESSION['user']['display_name'] ?></span>
          <a class="btn btn-danger" href="./auth/logout.php">Logout</a>
        </div>
        <?php endif ?>
       </div>
      </div>
    </nav>
    <?php if ( isset($_SESSION['user'])) : ?>
    <div id="htu-hero-wrapper" class="w-100 h-100 d-flex justify-content-center align-items-center">
      <div id="htu-hero" class="w-25 h-50 d-flex flex-column justify-content-center align-items-center">
        <p id="htu-slogen"><?= SLOGAN ?></p>
        <h1 id="htu-hp-title"><?= TITLE ?></h1>
        <form class="d-flex w-75" role="search" method="get" action="./search.php">
        <input class="form-control me-2" type="search" placeholder="Search" name="s" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      </div>
    </div>
    <?php endif ?>
  </header>