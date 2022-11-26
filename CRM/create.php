<?php include './header.php' ?>
<form class="w-50" method="POST" action="./store.php">
  <div class="mb-3">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="sales" class="form-control" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="sales" class="form-label">Sales Quantity</label>
    <input type="number" class="form-control" id="sales" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include './footer.php' ?>
