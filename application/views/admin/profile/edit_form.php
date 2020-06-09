  <!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head") ?>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/navbar") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading Breadcrumb -->
          <?php $this->load->view('admin/_partials/breadcrumb') ?>
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
              <?=$this->session->flashdata('success')?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
              <?=$this->session->flashdata('error')?>
            </div>
          <?php endif; ?>
          <!-- Content Row -->
          <div class="card mb-3">
            <div class="card-header">
              <a href="<?=base_url('admin')?>">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </div>
            <div class="card-body">
              
              <form action="<?=base_url('admin/profile/edit')?>" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                  <label for="name" class="col-md-3">Username</label>
                  <div class="col-md-9">
                    <input class="form-control" name="username" required value="admin" disabled>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-md-3">Old Password *</label>
                  <div class="col-md-9">
                    <input class="form-control <?=form_error('old_pass') ? 'is-invalid' : '' ?>" type="password" name="old_pass" placeholder="Old Password" required>
                    <div class="invalid-feedback">
                    <?=form_error('old_pass')?>  
                    </div> 
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-md-3">New Password *</label>
                  <div class="col-md-9">
                    <input class="form-control <?=form_error('new_pass') ? 'is-invalid' : '' ?>" type="password" name="new_pass" placeholder="New Password" required>
                    <div class="invalid-feedback">
                    <?=form_error('new_pass')?>  
                    </div> 
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-md-3">Retype New Password *</label>
                  <div class="col-md-9">
                    <input class="form-control <?=form_error('renew_pass') ? 'is-invalid' : '' ?>" type="password" name="renew_pass" placeholder="Retype New Password" required>
                    <div class="invalid-feedback">
                    <?=form_error('renew_pass')?>  
                    </div> 
                  </div>
                </div>

                <input type="submit" class="btn btn-success" value="Save" name="btn">
                
              </form>

            </div>
            <div class="card-footer small text-muted">
              * Required Fields
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('admin/_partials/footer') ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view('admin/_partials/scrolltop') ?>
  <!-- Logout Modal-->
  <?php $this->load->view('admin/_partials/modal') ?>
  <!-- JS -->
  <?php $this->load->view('admin/_partials/js') ?>

</body>

</html>
