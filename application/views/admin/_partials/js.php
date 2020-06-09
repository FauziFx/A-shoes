  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Datatables -->
  <script src="<?=base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?=base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
    function rupiah(bil){
      var reverse = bil.toString().split('').reverse().join(''),
        ribuan  = reverse.match(/\d{1,3}/g);
        ribuan  = "Rp. "+ribuan.join('.').split('').reverse().join('');

      // Cetak hasil  
      return ribuan;
      // document.write(ribuan);
    }
  </script>
  

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('js/sb-admin-2.min.js')?>"></script>
  <script src="<?=base_url('js/sweetalert2.min.js')?>"></script>

  <script>

  function shippingModal(id){
    var orderid = id;
    $('input[name=orderid]').val(orderid);
    $('input[name=user_id]').val($('#userid-'+id).val());
    $('#shippingModal').modal('show');
  }

  $('.view_order').on('click', function(){
    var $this   = $(this);
    var orderid = $this.data('orderid');
    var userid  = $this.data('userid');
    $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url("admin/orders/get_order_detail/")?>'+orderid,
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
                          rupiah(data[i].qty * data[i].price)+
                        "</td>"+
                      "</tr>";
          }
          $('#order_detail').prepend(html);
      }

    });

    $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url("admin/orders/get_user/")?>'+userid,
      async : false,
      dataType : 'json',
      success : function(data){
          $('#_name').html(data.name);
          $('#_no_hp').html(data.no_hp);
      }

    });
  });

  function viewOrder(id){
    var orderid       = $('#orderid-'+id).html().substring(1);
    var order_date    = $('#order_date-'+id).html();
    var grand_total   = $('#grand_total-'+id).html();
    var status        = $('#status-'+id).val();
    var courir        = $('#courir-'+id).val();
    var shipping_cost = $('#shipping_cost-'+id).val();
    var total         = $('#total-'+id).val();
    var address       = $('#address-'+id).val();
    var resi          = $('#resi-'+id).val();
    var userid        = $('#userid-'+id).val();

    $('#_orderid').val(orderid.trim());
    $('#_order_date').html(order_date);
    $('#_grand_total').html(grand_total);
    $('#_shipping_cost').html(rupiah(shipping_cost));
    $('#_subtotal').html(rupiah(total));
    $('#_address').html(address);
    $('#_courir').html(courir);
    $('#_resi').html(resi);
    $('#_userid').html(userid);

    if(status != '1'){
      $('#shipping').show();
    }

    $('#viewOrder').modal('show');
  }

  $(document).ready(function(){
    $('#shipping').hide();
    $('#viewOrder').on('hidden.bs.modal', function (e) {
      $('.detail_list').remove();
      $('#shipping').hide();
    });

    $('#shippingModal').on('hidden.bs.modal', function (e) {
      $('input[name=resi]').val('');
    });
  });
  </script>

  <script>
    function viewPayment(id){
      var paymentid = id;
      var orderid   = $('#orderid-'+paymentid).html();
      var name      = $('#name-'+paymentid).val();
      var email     = $('#email-'+paymentid).val();
      var date      = $('#payment_date-'+paymentid).html();
      var total     = $('#total_payment-'+paymentid).html();
      var bank      = $('#destination_bank-'+paymentid).html();
      var rekening  = $('#rekening_name-'+paymentid).val();
      var message   = $('#message-'+paymentid).val();
      var image     = $('#image-'+paymentid).val();

      $('#__orderid').val(orderid.trim());
      $('#__name').html(name);
      $('#__email').html(email);
      $('#__payment_date').html(date);
      $('#__total_payment').html(total);
      $('#__destination_bank').html(bank);
      $('#__rekening_name').html(rekening);
      $('#__message').html(message);
      $('#__image').attr('src', '<?=base_url('upload/payment/')?>'+image);

      $('#paymentModal').modal('show');
    }

    $(document).ready(function(){

      $('#copy').on('click', function(){
        $('#__orderid').select();
        document.execCommand('copy');
        alert('Copied on clipboard');
      });

    });
  </script>