<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('_partials/head') ?>
</head>
<body>
  <!-- Page Content -->
  <div class="container">

    <div class="row mt-4 justify-content-md-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body p-5">
            <a href="<?=base_url('users/auth')?>" class="text-left"><i class="fas fa-arrow-left"></i> Back</a>
            <h2 class="text-center">Create New Account</h2><hr>
            <form method="post">
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input name="username" type="text" class="form-control" placeholder="Username" required autofocus="">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-address-card"></i></div>
                </div>
                <input name="name" type="text" class="form-control" placeholder="Full Name" required>
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input name="email" type="email" class="form-control" placeholder="Email Address" required>
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-phone"></i></div>
                </div>
                <input name="nohp" type="text" class="form-control" placeholder="No Hp" maxlength="13" required>
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input name="password" type="password" class="form-control" placeholder="Password (Min. 8 Character)" required>
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input name="repassword" type="password" class="form-control" placeholder="Confirm Password" required>
              </div>
              <input type="submit" class="btn btn-lg btn-primary mx-auto" value="Register" style="width: 100%">
            </form>
          </div>
        </div>
      </div>
      <!-- col -->
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<!-- JS -->
<?php $this->load->view('_partials/js') ?>
</body>
</html>