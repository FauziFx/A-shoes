<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=SITE_NAME?> - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('css/sb-admin-2.min.css')?>" rel="stylesheet">

    <!-- Sweetalert2 -->
    <script src="<?=base_url('js/sweetalert2.min.js')?>"></script>
    <link rel="stylesheet" href="<?=base_url('css/sweetalert2.min.css')?>">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-9 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Enter Username..." name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script>
      <?php if($this->session->flashdata('msg')): ?>
          Swal.fire('Oops...','<?=$this->session->flashdata('msg')?>','error');
      <?php endif; ?>
  </script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('js/sb-admin-2.min.js')?>"></script>

</body>

</html>
