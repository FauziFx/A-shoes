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
          <?php endif; ?>
          
          <!-- Content Row -->
          <div class="card mb-3">
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>UserID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Name</th>
                      <th>No Hp</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($users as $data): ?>
                      <tr>
                        <td class="text-uppercase" id="userids-<?=$data->userid?>">
                          <?=$data->userid?>
                        </td>
                        <td id="usernames-<?=$data->userid?>"><?=$data->username?></td>
                        <td id="emails-<?=$data->userid?>"><?=$data->email?></td>
                        <td id="names-<?=$data->userid?>"><?=$data->name?></td>
                        <td id="no_hps-<?=$data->userid?>"><?=$data->no_hp?></td>
                        <td>
                          <button class="btn btn-success btn-sm" onclick="viewUser('<?=$data->userid?>')">
                            <i class="fas fa-edit"></i>
                          </button>
                          <a href="<?=base_url('admin/users/delete/').$data->userid?>" class="btn btn-danger btn-sm text-light" onclick="return confirm('Data akan dihapus?')">
                            <i class="fas fa-trash"></i>
                          </a>
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
    function viewUser(id){
      var userid   = id;
      var username = $('#usernames-'+userid).html();
      var email    = $('#emails-'+userid).html();
      var name     = $('#names-'+userid).html();
      var no_hp    = $('#no_hps-'+userid).html();

      $('#_userids').val(userid.trim());
      $('#_usernames').val(username);
      $('#_emails').val(email);
      $('#_names').val(name);
      $('#_no_hps').val(no_hp.trim());

      $('#userView').modal('show');
    }

  </script>

</body>

</html>

