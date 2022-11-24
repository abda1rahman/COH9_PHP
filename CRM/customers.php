<?php 
include './header.php' ;
$customer = get_customer($_GET['id']);
if ($customer == null)
  die('customer does not exist');



?>
<p>
  <strong>ID:</strong>
  <?= $customer['id'] ?>
</p>
<p>
  <strong>First Name:</strong>
  <?= $customer['firstname'] ?>
</p>
<p>
  <strong>Last Name:</strong>
  <?= $customer['lastname'] ?>
</p>
<p>
  <strong>Email:</strong>
  <?= $customer['email'] ?>
</p>
<p>
  <strong>Phone:</strong>
  <?= $customer['phone'] ?>
</p>
<p>
  <strong>Sales:</strong>
  <?= $customer['sales'] ?>
</p>
<p>
  <strong>Updated On:</strong>
  <?= $customer['update_on'] ?>
</p>
<p>
  <strong>Created On:</strong>
  <?= $customer['reg_date'] ?>
</p>

<?php include './footer.php' ?>
