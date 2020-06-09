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
          <!-- Content Row -->
          <div class="card mb-3">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <a href="<?=base_url('admin/category/add')?>">
                  <i class="fas fa-plus"></i> Add New
                </a>
              </div>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-hover" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                    foreach ($category as $row):
                   ?>  
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$row->category?></td>
                      <td>
                        <a href="<?=base_url('admin/category/edit/'.$row->categoryid)?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <a onclick="deleteConfirm('<?=base_url('admin/category/delete/'.$row->categoryid)?>')" href="javascript:void()" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

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


