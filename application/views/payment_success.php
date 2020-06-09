<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('_partials/head') ?>
</head>
<body>
<?php $this->load->view('_partials/navbar') ?>
  <!-- Page Content -->
  <div class="container">
  
    <!-- Breadcrumb -->
    <ol class="breadcrumb mt-3">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Payment Confirmation Successfully</li>
    </ol>

    <div class="row mb-4">
      <div class="col">
        
        <div class="card">
          <div class="card-body text-center">
          	<i class="fas fa-check-circle fa-5x text-success"></i>
          	<h3>Payment Confirmation Successfully</h3>
						<div>
							Invoice Number : <b class="text-uppercase"><?=$this->session->flashdata('payment') ?></b>
						</div><br>
						<p>Kami akan memverifikasi pembayaran paling lama 1x24 jam.
						jika dalam waktu 1x24 jam belum menerima email hubungi CS : 085xxxxxxxxx</p>
          </div>
        </div>
        <!-- card -->
      </div>
      <!-- col -->
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php $this->load->view('_partials/footer') ?> 
<!-- JS -->
<?php $this->load->view('_partials/js') ?>
</body>
</html>