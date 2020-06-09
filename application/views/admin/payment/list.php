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
                      <th>OrderId</th>
                      <th>Bank</th>
                      <th>Payment Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($payment as $data): ?>
                    <tr>
                      <td class="text-uppercase" id="orderid-<?=$data->paymentid?>">
                        #<?=$data->order_id?>
                      </td>
                      <td id="destination_bank-<?=$data->paymentid?>">
                        <?=$data->destination_bank?>
                      </td>
                      <td id="payment_date-<?=$data->paymentid?>">
                        <?=$date = date("d-M-Y", strtotime($data->payment_date));?>
                      </td>
                      <td id="total_payment-<?=$data->paymentid?>">
                        <?=rupiah($total=$data->total_payment)?>
                      </td>
                      <td>
                        <span class="badge badge-warning"><i class="fas fa-clock"></i> Pending</span>
                      </td>
                      <td>
                        <button class="btn btn-success btn-sm" onclick="viewPayment('<?=$data->paymentid?>')">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="<?=base_url('admin/payments/confirm_payment/').$data->paymentid?>" class="btn btn-primary btn-sm text-light" onclick="return confirm('Anda yakin pembayaran valid?')">
                          <i class="fas fa-check-circle"></i>
                        </a>
                        <a href="<?=base_url('admin/payments/delete/').$data->paymentid?>" class="btn btn-danger btn-sm text-light" onclick="return confirm('Pembayaran akan dihapus?')">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                      <input type="hidden" id="name-<?=$data->paymentid?>" value="<?=$data->name?>">
                      <input type="hidden" id="email-<?=$data->paymentid?>" value="<?=$data->email?>">
                      <input type="hidden" id="rekening_name-<?=$data->paymentid?>" value="<?=$data->rekening_name?>">
                      <input type="hidden" id="message-<?=$data->paymentid?>" value="<?=$data->message?>">
                      <input type="hidden" id="image-<?=$data->paymentid?>" value="<?=$data->image?>">
                      <input type="hidden" id="status-<?=$data->paymentid?>" value="<?=$data->status?>">
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
</body>

</html>

