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
      <li class="breadcrumb-item active" aria-current="page">Payment Confirmation</li>
    </ol>

    <div class="row mb-4">
      <div class="col">
        
        <div class="card">
          <div class="card-header">
            <h4>Payment Confirmation</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8 offset-md-2">

                <form method="post" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Name</label>
                    <div class="col-md-8">
                      <input name="name" type="text" class="form-control" placeholder="Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Email</label>
                    <div class="col-md-8">
                      <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Transfer Date</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                        <input name="payment_date" type="date" class="form-control" placeholder="" required max="<?=date('Y-m-d')?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Amount Payment</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input name="total_payment" type="number" class="form-control" id="inlineFormInputGroup" placeholder="199000" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Destination Bank</label>
                    <div class="col-md-8">
                      <select name="destination_bank" id="" class="form-control" required>
                        <option value="" selected="">---Select Bank---</option>
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="MANDIRI">MANDIRI</option>
                        <option value="BRI">BRI</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Rekening Name</label>
                    <div class="col-md-8">
                      <input name="rekening_name" type="text" class="form-control" placeholder="Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Invoice Number</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">#</div>
                        </div>
                        <input name="order_id" type="text" class="form-control" id="inlineFormInputGroup" placeholder="" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Additional Messsage</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="message" id="" cols="30" rows="3" placeholder="(Optional)"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label">Receipt Transfer</label>
                    <div class="col-md-8">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="datedCustomFile">Choose file...</label>
                      </div>
                      <small>Max file size 1MB</small>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">
                      <i class="fas fa-send"></i> Send
                    </button>
                  </div>
                </form>

              </div>
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

<?php $this->load->view('_partials/footer') ?> 
<!-- JS -->
<?php $this->load->view('_partials/js') ?>
</body>
</html>