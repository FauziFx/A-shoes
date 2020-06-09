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
            <h3 class="text-center">
              <a href="<?=base_url()?>">A-Shoes</a>
            </h3>
            <h2 class="text-center">Login page  </h2><hr>
            <form method="post">
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input name="username" type="text" class="form-control" placeholder="Email or Username" required autofocus="">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
              </div>
              <input type="submit" class="btn btn-lg btn-primary" value="Login" style="width: 100%">
            </form><hr>
            <a href="<?=base_url('users/auth/register')?>" class="btn btn-light btn-lg" style="width: 100%; border: 1px solid grey">Register</a>
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