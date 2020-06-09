<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('_partials/head') ?>
</head>
<body>
  <!-- Page Content -->
  <div class="container">

    <div class="row mb-4 mt-3">
      <div class="col">
        
        <div class="card">
          <div class="card-body">
            <a href="<?=base_url()?>">Home</a>

            <h2 class="text-center text-success">
              <i class="fas fa-check-circle"></i><br>
              Congratulations! Your order has been placed
            </h2>
            <p class="text-muted text-center">We will send an email to confirm your order detail, please check your email</p>
            <h4 class="text-warning text-center text-uppercase">
              INVOICE : <?=$order->orderid?>
            </h4>
            <div class="alert alert-warning" role="alert">
              Segera lakukan pembayaran melalui transfer Bank sebelum 
              <?php 
                $timestamp = strtotime($order->expire_date);
                echo date('d-m-Y H:i:s', $timestamp);
              ?>
            </div>
            <div class="text-center mb-2">
              <a href="<?=base_url('payment_confirmation')?>" class="btn btn-success">Konfirmasi Pembayaran</a>
            </div>
            <div class="container">
              <div class="row">
                <div class="col">
                  <table class="table">
                    <tr>
                      <td><img src="<?=base_url('img/bca_logo.png')?>" alt="" style="height: 25px"></td>
                      <td>123456789XXX</td>
                    </tr>
                    <tr>
                      <td class="text-right">a.n</td>
                      <td>TOKO A-Shoes</td>
                    </tr>
                  </table>
                </div>
                <div class="col">
                  <table class="table">
                    <tr>
                      <td><img src="<?=base_url('img/bni_logo.png')?>" alt="" style="height: 25px"></td>
                      <td>123456789XXX</td>
                    </tr>
                    <tr>
                      <td class="text-right">a.n</td>
                      <td>TOKO A-Shoes</td>
                    </tr>
                  </table>
                </div>
                <div class="col">
                  <table class="table">
                    <tr>
                      <td><img src="<?=base_url('img/mandiri_logo.jpg')?>" alt="" style="height: 25px"></td>
                      <td>123456789XXX</td>
                    </tr>
                    <tr>
                      <td class="text-right">a.n</td>
                      <td>TOKO A-Shoes</td>
                    </tr>
                  </table>
                </div>
                <div class="col">
                  <table class="table">
                    <tr>
                      <td><img src="<?=base_url('img/bri_logo.png')?>" alt="" style="height: 25px"></td>
                      <td>123456789XXX</td>
                    </tr>
                    <tr>
                      <td class="text-right">a.n</td>
                      <td>TOKO A-Shoes</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <td><b>Product Name</b></td>
                  <td class="text-right"><b>Price</b></td>
                  <td class="text-right"><b>Total</b></td>
                </tr>
              <?php foreach($detail as $item): ?>
                <tr class="bg-light">
                  <td><?=$item->product_name." (Size:".$item->sizes.") x".$item->qty?></td>
                  <td class="text-right"><?=rupiah($item->price)?></td>
                  <td class="text-right"><?=rupiah($item->total)?></td>
                </tr>
              <?php endforeach; ?>
              </thead>
              <tbody class="text-right">
                <tr>
                  <td></td>
                  <td>Sub Total :</td>
                  <td><?=rupiah($order->total)?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Shipping Cost :</td>
                  <td><?=rupiah($order->shipping_cost)?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Amount To Pay :</b></td>
                  <td><b><?=rupiah($amount=$order->total+$order->shipping_cost)?></b></td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
            
        </div>
        <!-- card -->
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