<?php include('./header.php'); ?>

<div class="d-flex flex-column justify-content-center align-items-center my-5">
  <form class="w-50">
    <div class="cv-info-1">
      <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname">
      </div>
      <div class="mb-3">
        <label for="fname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="fname" name="lname">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">phone</label>
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="address" class="form-control" id="address" name="address">
      </div>
    </div>

    <div class="cv-info-2">
      <div class="mb-3">
        <label for="objective" class="form-label">Objective</label>
        <textarea class="form-control" id="objective" rows="14" name="objective"></textarea>
      </div>
    </div>

    <div class="cv-info-3">
      <h3 class="form-label">Eduction</h3>
      <div class="mb-3">
        <label for="objective" class="form-label">Institute</label>
        <textarea type="text" class="form-control" id="objective" name="objective"></textarea>
      </div>

      <div class="mb-3">
        <label for="objective" class="form-label">Graduation DAte</label>
        <input type="date" class="form-control" id="objective" name="objective"></input>
      </div>
    </div>

    <div class="cv-info-4">
      <h3 class="form-label">Working Experience</h3>
      <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <textarea type="text" class="form-control" id="company" name="company"></textarea>
      </div>

      <div class="mb-3">
        <label for="sdate" class="form-label">Starting Date</label>
        <input type="date" class="form-control" id="sdate" name="sdate"></input>
      </div>
    </div>

    <div class="cv-info-5">
      <h3 class="form-label">Photo</h3>
      <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo"></input>
      </div>
    </div>



  </form>

  <div class="mt-4 px-4 d-flex justify-content-end w-50 align-items-center">
    <button id="back" class="btn btn-danger d-none">Back</button>
    <button id="next" class="btn btn-success">Next</button>
  </div>

</div>

<?php include('./footer.php'); ?>