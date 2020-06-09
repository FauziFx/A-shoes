  <!--Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="<?=base_url('users/auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Datatables -->
  <script src="<?=base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?=base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('js/sb-admin-2.min.js')?>"></script>
  <script src="<?=base_url('js/sweetalert2.min.js')?>"></script>

  <?php if($this->session->flashdata('addcart')): ?>
  <script>Swal.fire('Success', '<?=$this->session->flashdata('addcart')?>', 'success')</script>
  <?php endif; ?>

  <?php if($this->session->flashdata('error')): ?>
  <script>Swal.fire('Oopss...!', '<?=$this->session->flashdata('error')?>', 'error')</script>
  <?php endif; ?>

    <?php if($this->session->flashdata('success')): ?>
  <script>Swal.fire('Success', '<?=$this->session->flashdata('success')?>', 'success')</script>
  <?php endif; ?>

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
