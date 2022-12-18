<?php include "./header.php" ?>

<div class="d-flex justify-content-center align-items-center">
    <form class="w-50" action="./auth/validation.php" method="POST">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="./user_registration.php" class="btn btn-secondary">Wanna Register?</a>
      </div> 
    </form>

  </div>
</div>

<?php include "./footer.php" ?>