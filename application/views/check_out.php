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
      <li class="breadcrumb-item active" aria-current="page">Check Out</li>
    </ol>

    <div class="row mb-4">
      <div class="col">
        
        <div class="card">
          <div class="card-header">
            <h4>Check Out</h4>
          </div>

          <!-- Form -->
          <form id="form-checkout" action="" method="post">

          <div class="card-body row">
            <div class="col-md-6">
              <?php if($this->session->userdata('statususer') != 'login'): ?>
              <!-- Register -->
              <h4>Create Account</h4><hr>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username*</label>
                <div class="col-md-9">
                  <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" name="username" id="username" placeholder="Username" required="">
                  <div class="invalid-feedback">
                    <?php echo form_error('username') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Full Name*</label>
                <div class="col-md-9">
                  <input type="text" class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" name="name" id="name" placeholder="Full Name" required="">
                  <div class="invalid-feedback">
                    <?php echo form_error('name') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email*</label>
                <div class="col-md-9">
                  <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" name="email" id="email" placeholder="Email" required="">
                  <div class="invalid-feedback">
                    <?php echo form_error('email') ?>
                  </div>
                </div>
              </div><div class="form-group row">
                <label for="nohp" class="col-sm-3 col-form-label">No. Hp*</label>
                <div class="col-md-9">
                  <input type="text" class="form-control <?php echo form_error('nohp') ? 'is-invalid':'' ?>" name="nohp" id="nohp" placeholder="No HP" required="" maxlength="13">
                  <div class="invalid-feedback">
                    <?php echo form_error('nohp') ?>
                  </div>
                </div>
              </div><div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">New Password*</label>
                <div class="col-md-9">
                  <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" name="password" id="password" placeholder="New Password" required="">
                  <div class="invalid-feedback">
                    <?php echo form_error('password') ?>
                  </div>
                </div>
              </div><div class="form-group row">
                <label for="repassword" class="col-sm-3 col-form-label">Re-type Password*</label>
                <div class="col-md-9">
                  <input type="password" class="form-control <?php echo form_error('repassword') ? 'is-invalid':'' ?>" name="repassword" id="repassword" placeholder="Re-type Password" required="">
                  <div class="invalid-feedback">
                    <?php echo form_error('repassword') ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <!--  -->
              <div class="form-group row">
                <label for="province" class="col-sm-3 col-form-label">Province*</label>
                <div class="col-md-9">
                  <select name="province" id="province" class="form-control" required="">
                    <option value="">Select Province</option>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('province') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="city" class="col-sm-3 col-form-label">City*</label>
                <div class="col-md-9">
                  <select name="city" id="city" class="form-control" disabled required="">
                    <option value="">Select City</option>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('city') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="courir" class="col-sm-3 col-form-label">Courir*</label>
                <div class="col-md-9">
                  <select name="courir" id="courir" class="form-control" disabled required="">
                    <option value="">Select Courir</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS Indonesia</option>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('courir') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="service" class="col-sm-3 col-form-label"></label>
                <div class="col-md-9" id="">
                  <select name="service" id="service" class="form-control" required="">
                    <option value="">Select Services*</option>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('service') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Address*</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="address" id="address" cols="5" rows="3" placeholder="Address" required=""></textarea>
                  <div class="invalid-feedback">
                    <?php echo form_error('address') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="postalcode" class="col-sm-3 col-form-label">Postal Code*</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="Postal Code" required="">
                  <div class="invalid-feedback">
                    <?php echo form_error('postalcode') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <ul class="list-group">
                <?php
                  // Create form and send all values in "shopping/update_cart" function.
                  $grand_total = 0;
                  $qty = 0;
                  $i = 1;
                  $cart = $this->cart->contents();
                  foreach ($cart as $item):
                  $grand_total = $grand_total + $item['subtotal'];
                  $qty = $qty + $item['qty'];
                ?>
                <li class="list-group-item d-flex">
                  <div class="mr-auto"><?=$item['name']." (".substr($item['size'],0,2).")"?></div>
                  <div class="mr-auto"><?=$item['qty'].'x'?></div>
                  <div class=""><?=rupiah($item['subtotal'])?></div>
                </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex">
                  <div class="ml-auto">Grand Total :</div>
                  <div class="ml-auto" id="grand_total"><?=rupiah($grand_total)?></div>
                </li>
                <li class="list-group-item d-flex">
                  <div class="ml-auto">Shipping Cost :</div>
                  <div class="ml-auto" id="shipping_cost"></div>
                </li>
                <li class="list-group-item d-flex">
                  <h4 class="ml-auto font-weight-bold" id="total"></h4>
                </li>
              </ul><br>
              <input type="hidden" name="total" value="<?=$grand_total?>">
              <button type="submit" class="btn btn-lg btn-primary" style="width: 100%">
                <i class="fas fa-shopping-cart"></i> 
                Order Now
              </button>
              <?php if($this->session->userdata('statususer') != 'login'): ?>
              <hr>
              <center>
                <div class="text-primary">
                  <a href="">Already have an account? Login!</a>
                </div>
              </center>
            <?php endif; ?>
            </div>
          </div>
          <!-- Card-body -->

          </form>
          <!-- ./Form -->

          <div class="card-footer small text-danger">
            * Required Fields
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
<script>
  function getProv() {
    var $prov = $("#province");
    
    $.getJSON("get_province", function(data){  
      $.each(data, function(i,field){  
        $prov.append('<option value="'+field.province_id+'-'+field.province+'">'+field.province+'</option>'); 
      });
    });
   $("#service").hide();
  }
  getProv();

$(document).ready(function() {
  $("#province").on("change", function(e){
    e.preventDefault();
    var prov = $('option:selected', this).val();
    $('#city option:gt(0)').remove();

    if(prov===''){
      $("#city").prop("disabled", true);
      $("#courir").prop("disabled", true);
      $("#service").hide();
      $("#shipping_cost").html('');
      $("#total").html('');
    }else{        
      $("#city").prop("disabled", false);
      var $city = $("#city");

      $.getJSON("get_city/"+prov, function(data){  
        $.each(data, function(i,field){  
          $city.append('<option value="'+field.city_id+"-"+field.type+" "+field.city_name+'">'+field.type+" "+field.city_name+'</option>'); 
        });
      });
    }
  });

  $("#city").on("change", function(e){
    e.preventDefault();
    var city = $('option:selected', this).val();

    if(city===''){
      $("#courir").prop("disabled", true);
      $("#service").hide();
      $("#shipping_cost").html('');
      $("#total").html('');
    }else{        
      $("#courir").prop("disabled", false);
    }
  });

  $("#courir").on("change", function(e){
    e.preventDefault();
    $('#service option:gt(0)').remove();
    var dest = $("#city").val();
    var weight = <?=$weight = $qty * 500?>;
    var courir = $('option:selected', this).val();

    if(courir===''){
      $("#service").hide();
      $("#shipping_cost").html('');
      $("#total").html('');
    }else{        
      $("#service").show();
      var $service = $("#service");

      $.getJSON("get_cost/"+dest+"/"+weight+"/"+courir, function(data){  
        $.each(data, function(i,field){  
          $service.append("<option value='"+field.cost[0].value+"'>"+
                            field.service+" ("+field.cost[0].etd+" Hari) - Rp"+field.cost[0].value+
                          "</option>"
          );
        });
      });
    }
  });

  $("#service").on("change",function(){
    var service = $('option:selected', this).val();

    if(service===''){
      $("#shipping_cost").html('');
      $("#total").html('');
    }else{        
      var grand_total = $("#grand_total").html();
      grand_total = parseInt(grand_total.split('.').join("").substr(3));
      var ongkir = parseInt($(this).val());
      var total = grand_total + ongkir;
      $("#shipping_cost").html(rupiah(ongkir));
      $("#total").html(rupiah(total));
    }
  });

});
</script>
</body>
</html>