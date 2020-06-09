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
          <?php if($this->session->flashdata('editabout')): ?>
            <div class="alert alert-success" role="alert">
              <?=$this->session->flashdata('editabout')?>
            </div>
          <?php endif; ?>
          <!-- Content Row -->
          <div class="card mb-3">
            <div class="card-header">
              <a href="<?=base_url('admin/about')?>">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </div>
            <div class="card-body">
              
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="" class="col-md-2">Shop Name *</label>
                  <div class="col-md-10">
                    <input class="form-control <?=form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Shop Name" required value="<?=$about->name?>">
                    <div class="invalid-feedback">
                      <?=form_error('name')?>  
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-md-2">Description *</label>
                  <div class="col-md-10">
                    <textarea class="form-control <?=form_error('description') ? 'is-invalid' : '' ?>" name="description" id="" cols="30" rows="5" placeholder="Description" required><?=$about->description?></textarea>
                    <div class="invalid-feedback">
                      <?=form_error('description')?>  
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-md-2">Address *</label>
                  <div class="col-md-10">
                    <textarea class="form-control <?=form_error('address') ? 'is-invalid' : '' ?>" name="address" id="" cols="30" rows="3" placeholder="Address" required><?=$about->address?></textarea>
                    <div class="invalid-feedback">
                      <?=form_error('address')?>  
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-md-2">Email *</label>
                  <div class="col-md-10">
                    <input class="form-control <?=form_error('email') ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="mail@mail.com" required value="<?=$about->email?>">
                    <div class="invalid-feedback">
                      <?=form_error('email')?>  
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-md-2">Instagram *</label>
                  <div class="col-md-10">
                    <input class="form-control <?=form_error('instagram') ? 'is-invalid' : '' ?>" type="url" name="instagram" placeholder="https://instagram.com/account" required value="<?=$about->instagram?>">
                    <div class="invalid-feedback">
                      <?=form_error('instagram')?>  
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-md-2">Facebook *</label>
                  <div class="col-md-10">
                    <input class="form-control <?=form_error('facebook') ? 'is-invalid' : '' ?>" type="text" name="facebook" placeholder="https://facebook.com/account" required value="<?=$about->facebook?>">
                    <div class="invalid-feedback">
                      <?=form_error('facebook')?>  
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
