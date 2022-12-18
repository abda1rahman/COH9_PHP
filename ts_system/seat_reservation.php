<?php 
include 'header.php';

if(empty($_GET['id'])){
  die("you are trying to access directly");
 }

 $ts = new ts();
 $seat = $ts->get_seat($_GET['id']);
 

if($seat->is_available){
  $ts->update_seat_reservation($_GET['id'],0,$_SESSION['user']['user_id']);
}elseif($seat->user_id != $_SESSION['user']['user_id']){
 die("You are trying t ounreserve a seat that does not belong to you!");
}else{
  $ts->update_seat_reservation($seat->id,1,"NULL");
}


$ts->ts_redirect('./home.php');