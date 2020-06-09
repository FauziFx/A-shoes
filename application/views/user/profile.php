<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('_partials/head') ?>
  <style>
    a {
        text-decoration: none !important;
    }
  </style>
</head>
<body>
<?php $this->load->view('_partials/navbar') ?>
  <!-- Page Content -->
  <div class="container my-3">

    <!-- Breadcrumb -->
    <ol class="breadcrumb mt-3">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Profile</a></li>
    </ol>

    <div class="row">
      
      <div class="col-lg-3">
        <div class="media">
            <img class="rounded-circle align-self-center mr-3" src="http://dummyimage.com/600x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image" height="100px">
          <div class="media-body align-self-center">
            <b class="mt-0"><?=$user->username?></b>
          </div>
        </div>
        <hr>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link" data-toggle="pill" href="#v-myaccount" role="tab" aria-selected="false">
            <i class="fas fa-user"></i> My Account
          </a>
          <a class="nav-link" data-toggle="pill" href="#v-transaction" role="tab" aria-selected="false">
            <i class="fas fa-list-alt"></i> Transaction
          </a>
          <a class="nav-link" data-toggle="pill" href="#v-changepassword" role="tab" aria-selected="false">
            <i class="fas fa-lock"></i> Change Password
          </a>
        </div>
  
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9">
        
        <div class="card">
          <div class="card-body">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade" id="v-myaccount" role="tabpanel" aria-labelledby="v-myaccount-tab">
                <h4>My Account</h4><hr>
                <form action="<?=base_url('users/profile/update')?>" method="post">
                  <div class="form-group row">  
                    <div class="col-md-2">
                      <label for="username">Username</label>
                    </div>
                    <div class="col-md-10">
                      <?=$user->username?>
                    </div>
                  </div>
                  <div class="form-group row">  
                    <div class="col-md-2">
                      <label for="name">Full Name</label>
                    </div>
                    <div class="col-md-10"> 
                      <input type="text" name="name" class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" value="<?=$user->name?>" placeholder="Full Name" required="">
                      <div class="invalid-feedback">
                        <?php echo form_error('name') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">  
                    <div class="col-md-2">
                      <label for="email">Email</label>
                    </div>
                    <div class="col-md-10"> 
                      <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" value="<?=$user->email?>" placeholder="Email Address" required="">
                      <div class="invalid-feedback">
                        <?php echo form_error('email') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">  
                    <div class="col-md-2">
                      <label for="nohp">No. Hp</label>
                    </div>
                    <div class="col-md-10"> 
                      <input type="text" name="nohp" class="form-control <?php echo form_error('nohp') ? 'is-invalid':'' ?>" value="<?=$user->no_hp?>" placeholder="No Hp" required="" maxlength="13">
                      <div class="invalid-feedback">
                        <?php echo form_error('nohp') ?>
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Save">
                </form>
              </div>
              <div class="tab-pane fade table-responsive" id="v-transaction" role="tabpanel" aria-labelledby="v-transaction-tab">
                <h4>My Transaction</h4><hr>
                <table class="table table-hover" id="dataTable">
                  <thead class="bg-primary text-light">
                    <tr>
                      <th>OrderID</th>
                      <th>Order Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allorder as $data): ?>
                    <tr>
                      <td>
                        <a href="" class="text-uppercase" id="orderid-<?=$data->orderid?>">#<?=$data->orderid?></a>
                      </td>
                      <td id="order_date-<?=$data->orderid?>"><?=$date = date("d-M-Y", strtotime($data->order_date));?></td>
                      <td id="grand_total-<?=$data->orderid?>"><?=str_replace(" ", "", rupiah($total=$data->total+$data->shipping_cost))?></td>
                      <td>
                        <?php 
                          switch ($data->status) {
                            case '1':
                              echo '<span class="badge badge-warning"><i class="fas fa-wallet"></i> Unpaid</span>';
                              break;
                            case '2':
                              echo '<span class="badge badge-success"><i class="fas fa-shipping-fast"></i> Shipping</span>';
                              break;
                            case '3':
                              echo '<span class="badge badge-primary"><i class="fas fa-check"></i> Complete</span>';
                              break;
                            case '4':
                              echo '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Canceled</span>';
                              break;
                          }
                        ?>
                      </td>
                      <td>
                        <a href="#" class="view_order text-success" data-orderid="<?=$data->orderid?>" onclick="viewOrder('<?=$data->orderid?>')"><small><i class="fas fa-eye"></i> View</small></a>&nbsp;
                        <!-- <?php if($data->status == '1'): ?>
                          <a href="#" class="text-danger"><small><i class="fas fa-times"></i> Cancel</small></a>
                        <?php endif; ?> -->
                      </td>
                      <input type="hidden" id="expire_date-<?=$data->orderid?>" value="<?=date('d-m-Y H:i:s', strtotime($data->expire_date));?>">
                      <input type="hidden" id="courir-<?=$data->orderid?>" value="<?=$data->courir?>">
                      <input type="hidden" id="shipping_cost-<?=$data->orderid?>" value="<?=$data->shipping_cost?>">
                      <input type="hidden" id="address-<?=$data->orderid?>" value="<?=$data->address?>">
                      <input type="hidden" id="total-<?=$data->orderid?>" value="<?=$data->total?>">
                      <input type="hidden" id="status-<?=$data->orderid?>" value="<?=$data->status?>">
                      <input type="hidden" id="resi-<?=$data->orderid?>" value="<?=$data->resi?>">
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="v-changepassword" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <h4>Change Password</h4><hr>
                <form action="<?=base_url('users/profile/changepassword')?>" method="post">
                  <div class="form-group row">  
                    <div class="col-md-3">
                      <label for="oldpassword">Old Password</label>
                    </div>
                    <div class="col-md-9">
                      <input type="password" name="oldpassword" class="form-control <?php echo form_error('oldpassword') ? 'is-invalid':'' ?>" value="" placeholder="Old Password" minlength="8" required="">
                      <div class="invalid-feedback">
                        <?php echo form_error('oldpassword') ?>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row">  
                    <div class="col-md-3">
                      <label for="newpassword">New Password</label>
                    </div>
                    <div class="col-md-9"> 
                      <input type="password" name="newpassword" class="form-control <?php echo form_error('newpassword') ? 'is-invalid':'' ?>" value="" placeholder="New Password" minlength="8" required="">
                      <div class="invalid-feedback">
                        <?php echo form_error('newpassword') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">  
                    <div class="col-md-3">
                      <label for="confirmpassword">Confirm Password</label>
                    </div>
                    <div class="col-md-9"> 
                      <input type="password" name="confirmpassword" class="form-control <?php echo form_error('confirmpassword') ? 'is-invalid':'' ?>" value="" placeholder="Confirm Password" minlength="8" required="">
                      <div class="invalid-feedback">
                        <?php echo form_error('confirmpassword') ?>
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Save">
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!--View Order -->
  <div class="modal fade" id="viewOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Order</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">Nomor Invoice</div>
            <input type="text" readonly="" id="_orderid" class="form-control text-uppercase text-center mx-auto" style="width: 250px">
          <div class="text-center">
            <button id="copy" class="btn btn-sm btn-light p-0">
              <i class="fas fa-copy"></i>  Copy to clipboard
            </button>
          </div>
          <p class="text-center" id="infoTotal">
            Agar pesanan dapat kami proses dengan cepat. Kami berharap membayar sesuai dengan TOTAL KESELURUHAN (<span class="_grand_total"></span>)
          </p>
          <div id="rekening">
            <small><b>lakukan pembayaran melewati Bank dibawah ini:</b></small>
            <div class="table-responsive">
              <table style='font-size:14px;text-align:left;width:100%;border-top:1px solid #ccc'>
                <tbody>
                  <tr>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
                      BCA
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px'>
                      <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
                      847xxxxxxx
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0'>
                      <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
                      John Doe
                    </td>
                  </tr>
                  <tr>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
                    BNI
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px'>
                    <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
                    050xxxxxxx
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0'>
                    <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
                    John Doe
                    </td>
                  </tr>
                  <tr>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
                    BRI
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px'>
                    <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
                    2058xxxxxxxxxx
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0'>
                    <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
                    John Doe
                    </td>
                  </tr>
                  <tr>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
                    MANDIRI
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px'>
                    <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
                    1300xxxxxxxxx
                    </td>
                    <td style='border-bottom:1px solid #ccc;padding:5px 0'>
                    <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
                    John Doe
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <br><strong>Berikut adalah detail order : </strong><br>
          <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px'>
            <thead id="shipping">
              <tr>
                <td valign='top' style='padding:5px 0'><b>Kurir</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' class="text-uppercase" id="_courir"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>No. Resi</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' class="text-uppercase" id="_resi"></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Nama</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0'><?=$this->session->userdata('name')?></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Alamat</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="_address"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Telepon</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0'><?=$this->session->userdata('no_hp')?></td>
              </tr>
            </tbody>
          </table>
          
          <div class="table-responsive">
            <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px;width:100%'>
              <thead>
                <tr>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;color:#007bff'>
                    <b>NAMA BARANG</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:center;color:#007bff'>
                    <b>QTY</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:right;color:#007bff'>
                    <b>HARGA</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:right;color:#007bff'>
                    <b>TOTAL</b>
                  </td>
                </tr>
              </thead>
              <tbody id="order_detail">
                <!-- order_detail -->
                <tr>
                  <td style='padding:8px 5px;border-top:2px solid #ccc;color:#007bff' colspan='3'>
                    <b>TOTAL</b>
                  </td>
                  <td style='padding:5px;border-top:2px solid #ccc;text-align:right'>
                    <b id='subtotal'></b>
                  </td>
                </tr>
                <tr>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;color:#007bff' colspan='3'>
                    <b>ONGKOS KIRIM</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:right'>
                    <b id="_shipping_cost"></b>
                  </td>
                </tr>
                <tr>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;color:#007bff' colspan='3'>
                    <b>TOTAL KESELURUHAN</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right'>
                    <b class="_grand_total"></b>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="text-center">
            
          </div>
          <div class="text-center" id="unpaid">
            Maksimal batas pembayaran adalah 1x24 jam sebelum tanggal <b class="text-primary" id="_expire_date"></b>. 
            Jika dalam waktu 1x24 jam  belum melakukan pembayaran, maka pesanan akan dianggap hangus/batal.
            <br><br>
            Jika sudah melakukan pembayaran, harap segera konfirmasi atau klik tombol konfirmasi di bawah ini :
            <br><br>
            <a href='<?=base_url('payment_confirmation')?>' style='color:#fff;display:inline-block;padding:7px 15px 5px 15px;border:2px solid #007bff;color:#007bff;font-size:16px;font-weight:700;text-decoration:none' target='_blank'>KONFIRMASI PEMBAYARAN</a>
          </div>
          <div class="text-center" id="receive">
            <a href="#" onclick="return confirm('Are you sure? Confirm receive order')" class="btn btn-success bg-success text-light">
              <i class="fas fa-check"></i>  CONFIRM RECEIVE ORDER
            </a>
            <br>
          </div>
          <div class="text-center" id="complete">
            <div class="p-2 bg-success text-light">
              <i class="fas fa-check"></i>  COMPLETE ORDER
            </div>
            <br>
          </div>
          <div class="text-center" id="cancel">
            <div class="p-2 bg-danger text-light">
              <i class="fas fa-times"></i>  ORDER CANCELED
            </div>
            <br>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('_partials/footer') ?> 
<!-- JS -->
<?php $this->load->view('_partials/js') ?>
<script>
  $('#unpaid').hide();
  $('#shipping').hide();
  $('#receive').hide();
  $('#complete').hide();
  $('#cancel').hide();
  $('#copy').hide();
  $('#infoTotal').hide();
  $('#rekening').hide();

// function get_order_detail(orderid){
$('.view_order').on('click', function(){
  var $this = $(this);
  var orderid = $this.data('orderid');
  $.ajax({
    type  : 'ajax',
    url   : '<?php echo base_url("users/transaction/get_order_detail/")?>'+orderid,
    async : false,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        var subtotal = '';
        for(i=0; i<data.length; i++){
            html += "<tr class='detail_list'>"+
                      "<td valign='top' style='padding:8px 5px;border-top:1px solid #ccc'>"+
                        "<b>"+data[i].product_name+"</b> (Size:"+data[i].sizes+")"+
                      "</td>"+
                      "<td valign='top' style='padding:8px 5px;border-top:1px solid #ccc;text-align:center'>"+
                        data[i].qty+
                      "</td>"+
                      "<td valign='top' style='padding:8px 5px;border-top:1px solid #ccc;text-align:right'>"+
                        rupiah(data[i].price)+
                      "</td>"+
                      "<td valign='top' style='padding:8px 5px;border-top:1px solid #ccc;text-align:right'>"+
                        rupiah(data[i].total)+
                      "</td>"+
                    "</tr>";
            subtotal = parseInt(subtotal + data[i].total);
        }
        $('#subtotal').html(rupiah(subtotal));
        $('#order_detail').prepend(html);
    }

  });
});
// }

function viewOrder(id){
  var orderid       = $('#orderid-'+id).html().substring(1);
  var order_date    = $('#order_date-'+id).html();
  var grand_total   = $('#grand_total-'+id).html();
  var expire_date   = $('#expire_date-'+id).val();
  var status        = $('#status-'+id).val();
  var courir        = $('#courir-'+id).val();
  var shipping_cost = $('#shipping_cost-'+id).val();
  var total         = $('#total-'+id).val();
  var address       = $('#address-'+id).val();
  var resi          = $('#resi-'+id).val();

  $('#_orderid').val(orderid);
  $('#_order_date').html(order_date);
  $('._grand_total').html(grand_total);
  $('#_expire_date').html(expire_date);
  $('#_shipping_cost').html(rupiah(shipping_cost));
  $('#_total').html(total);
  $('#_address').html(address);
  $('#_courir').html(courir);
  $('#_resi').html(resi);
  $('#_copy').val(orderid);

  switch(status){
    case '1':
      $('#unpaid').show();
      $('#copy').show();
      $('#infoTotal').show();
      $('#rekening').show();
      break;
    case '2':
      $('#shipping').show();
      $('#receive').show();
      $('#receive a').attr('href', '<?=base_url("users/transaction/receive/")?>'+orderid);
      break;
    case '3':
      $('#complete').show();
      $('#shipping').show();
      break;
    case '4':
      $('#cancel').show();
      break;
  }


  $('#viewOrder').modal('show');
}

$(document).ready(function(){

  $('#copy').on('click', function(){
    $('#_orderid').select();
    document.execCommand('copy');
    alert('Copied on clipboard');
  });

  $('#viewOrder').on('hidden.bs.modal', function (e) {
    $('.detail_list').remove();
    $('#unpaid').hide();
    $('#shipping').hide();
    $('#receive').hide();
    $('#complete').hide();
    $('#cancel').hide();
    $('#copy').hide();
    $('#infoTotal').hide();
    $('#rekening').hide();
  });

  $.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
  }

  switch($.urlParam('menu')) {
    case 'myaccount':
      $('#v-myaccount').addClass('show active');
      break;
    case 'changepassword':
      $('#v-changepassword').addClass('show active');
      break;
    default:
      $('#v-transaction').addClass('show active');
  }

});
</script>
</body>
</html>