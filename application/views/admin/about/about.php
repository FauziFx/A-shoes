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
          <?php if($this->session->flashdata('successdelete')): ?>
            <div class="alert alert-success" role="alert">
              <?=$this->session->flashdata('successdelete')?>
            </div>
          <?php endif; ?>
          <!-- Content Row -->
          <div class="card mb-3">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <a href="<?=base_url('admin/about/edit')?>">
                  <i class="fas fa-edit"></i> Edit
                </a>
              </div>
            </div>
            <div class="card-body">
             
              <h1><?=$about->name?></h1>
              <div class="card bg-light">
                <div class="card-body">
                  <h4><i class="fas fa-info"></i> Description</h4>
                  <p><?=$about->description?></p>
                  <h4><i class="fas fa-map-marker-alt"></i> Address</h4>
                  <p><?=$about->address?></p>
                  <a href="<?=$about->email?>"><i class="fas fa-envelope fa-2x"></i> <?=$about->email?></a>&nbsp;
                  <a href="<?=$about->facebook?>"><i class="fab fa-facebook-square fa-2x"></i> <?=$about->facebook?></a>&nbsp;
                  <a href="<?=$about->instagram?>"><i class="fab fa-instagram fa-2x"></i> <?=$about->instagram?></a>
                </div>
              </div>
              <h1>Gallery</h1>

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php 
                    $i = 0;
                    foreach ($gallery as $img):
                     $i++
                    ?>
                    <div class="carousel-item <?php if($i == 1) echo'active';?>">
                      <img class="d-block w-100" src="<?=base_url('upload/gallery/'.$img->image)?>">
                      <div class="carousel-caption d-none d-md-block">
                        <a href="#" class="btn btn-danger btn-sm" onclick="deleteConfirm('<?=base_url('admin/about/delete/'.$img->galleryid)?>')">
                          <i class="fas fa-trash"></i> Hapus
                        </a>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><br>  
                <a href="<?=base_url('admin/about/add_gallery')?>" class="d-flex justify-content-center btn btn-lg btn-primary">
                  <i class="fas fa-plus"></i> Add Gallery
                </a>

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
  <script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>

</body>

</html>


