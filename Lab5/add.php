<?php require('header.php'); ?>
<form action = 'index.php' method = 'POST'>
  <div class="row mb-3">
    <label for="firstname" class="col-sm-2 col-form-label">First name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname">
    </div>
  </div>

  <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name">
    </div>
  </div>

  <div class="row mb-3">
    <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname">
    </div>
  </div>

  <div class="row mb-3">
    <label for="date" class="col-sm-2 col-form-label">date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="date">
    </div>
  </div>

  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email">
    </div>
  </div>

  <div class="row mb-3">
    <label for="phone" class="col-sm-2 col-form-label">phone</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" id="phone">
    </div>
  </div>

  <div class="row mb-3">
    <label for="Comment" class="col-sm-2 col-form-label">Comment</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Comment">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<?php require('footer.php');?>