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
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>OrderId</th>
                      <th>Order Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($order as $data): ?>
                    <tr>
                      <td class="text-uppercase" id="orderid-<?=$data->orderid?>">
                        #<?=$data->orderid?>
                      </td>
                      <td id="order_date-<?=$data->orderid?>">
                        <?=$date = date("d-M-Y", strtotime($data->order_date));?>
                      </td>
                      <td id="grand_total-<?=$data->orderid?>">
                        <?=str_replace(" ", "", rupiah($total=$data->total+$data->shipping_cost))?>
                      </td>
                      <td>
                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> Canceled</span>
                      </td>
                      <td>
                        <button class="btn btn-success btn-sm view_order" onclick="viewOrder('<?=$data->orderid?>')" data-orderid="<?=$data->orderid?>" data-userid="<?=$data->user_id?>">
                          <i class="fas fa-eye"></i>
                        </button>

                      </td>
                    <input type="hidden" id="courir-<?=$data->orderid?>" value="<?=$data->courir?>">
                    <input type="hidden" id="shipping_cost-<?=$data->orderid?>" value="<?=$data->shipping_cost?>">
                    <input type="hidden" id="address-<?=$data->orderid?>" value="<?=$data->address?>">
                    <input type="hidden" id="total-<?=$data->orderid?>" value="<?=$data->total?>">
                    <input type="hidden" id="status-<?=$data->orderid?>" value="<?=$data->status?>">
                    <input type="hidden" id="resi-<?=$data->orderid?>" value="<?=$data->resi?>">
                    <input type="hidden" id="userid-<?=$data->orderid?>" value="<?=$data->user_id?>">
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

