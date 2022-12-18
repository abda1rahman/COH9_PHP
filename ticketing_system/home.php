<?php include "./header.php";

$seats = get_seats();




?>


<div class="row my-5">

<?php foreach ( $seats as $seat ) : ?>
  <div class="ts-seat col-2 m-2 p-2 d-flex justify-content-center align-items-center available-seat">
      <?= $seat->seat_num ?>
  </div>
<?php endforeach ?>

</div>


<?php include "./footer.php" ?>
