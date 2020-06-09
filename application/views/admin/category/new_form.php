<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head") ?>
  <style>
    input{
      text-transform: capitalize;
    }
  </style>
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
          <?php endif; ?>
          <!-- Content Row -->
          <div class="card mb-3">
            <div class="card-header">
              <a href="<?=base_url('admin/category')?>">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </div>
            <div class="card-body">
              <form action="" method="post">
                
                <div class="form-group row">
                  <label for="name" class="col-md-2">Category *</label>
                  <div class="col-md-10">
                    <input class="form-control <?=form_error('category') ? 'is-invalid' : '' ?>" type="text" name="category" placeholder="Category" required>
                    <div class="invalid-feedback">
                    <?=form_error('category')?>  
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