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
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <a href="<?=base_url('admin/products/add')?>">
                  <i class="fas fa-plus"></i> Add New
                </a>
              </div>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($products as $p): ?>
                    <tr id="row-<?=$p->productid ?>">
                      <td><img src="<?=base_url('upload/product/'.$p->image1)?>" alt="" height="80px"></td>
                      <td id="category-<?=$p->productid?>"><?=$p->category?></td>
                      <td id="product_name-<?=$p->productid?>"><?=$p->product_name?></td>
                      <td id="price-<?=$p->productid?>">Rp.<?=$p->price?></td>
                      <td width="250">
                        <a href="#" class="btn btn-sm text-primary" onclick="productDetail('<?=$p->productid?>')">
                          <i class="fas fa-info"></i> Detail
                        </a>
                        <a href="<?=base_url('admin/products/edit/'.$p->productid)?>" class="btn btn-sm text-success">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" class="btn btn-sm text-danger" onclick="deleteConfirm('<?=$p->productid ?>',<?=$p->sizeid ?>,<?=$p->productimageid ?>)">
                          <i class="fas fa-trash"></i> Delete
                        </a>
                      </td>
                      <input type="hidden" value="<?=$p->eur_38?>" id="eur_38-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->eur_39?>" id="eur_39-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->eur_40?>" id="eur_40-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->eur_41?>" id="eur_41-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->eur_42?>" id="eur_42-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->eur_43?>" id="eur_43-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->eur_44?>" id="eur_44-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->image1?>" id="image1-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->image2?>" id="image2-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->image3?>" id="image3-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->image4?>" id="image4-<?=$p->productid?>">
                      <input type="hidden" value="<?=$p->description?>" id="description-<?=$p->productid?>">
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
    $(document).ready(function() { 
      $('#productDetailModal').on('hidden.bs.modal', function (e) {
        $('#image').empty();
      });
    });
    function productDetail(id){
      var category     = $('#category-'+id).html();
      var product_name = $('#product_name-'+id).html();     
      var price        = $('#price-'+id).html();      
      var description  = $('#description-'+id).val();     
      var eur_38       = $('#eur_38-'+id).val();
      var eur_39       = $('#eur_39-'+id).val();      
      var eur_40       = $('#eur_40-'+id).val();      
      var eur_41       = $('#eur_41-'+id).val();      
      var eur_42       = $('#eur_42-'+id).val();      
      var eur_43       = $('#eur_43-'+id).val();      
      var eur_44       = $('#eur_44-'+id).val();      
      var image1       = $('#image1-'+id).val();      
      var image2       = $('#image2-'+id).val();      
      var image3       = $('#image3-'+id).val();      
      var image4       = $('#image4-'+id).val();      
      
      $('#category').html(category);
      $('#product_name').html(product_name);
      $('#price').html(price);
      $('#description').html(description);
      $('#eur_38').html(eur_38);
      $('#eur_39').html(eur_39);
      $('#eur_40').html(eur_40);
      $('#eur_41').html(eur_41);
      $('#eur_42').html(eur_42);
      $('#eur_43').html(eur_43);
      $('#eur_44').html(eur_44);

      $('#img1').attr('src', "<?=base_url('upload/product/')?>"+image1);
      $('#img2').attr('src', "<?=base_url('upload/product/')?>"+image2);
      $('#img3').attr('src', "<?=base_url('upload/product/')?>"+image3);
      $('#img4').attr('src', "<?=base_url('upload/product/')?>"+image4);

      $("#productDetailModal").modal();
    }

    // Delete Ajax
    function deleteConfirm(id, size, image){
      var id = id;
      var size = size;
      var image = image;
      $('#deleteModal').modal('show');

      $('#btn-delete').on('click', function(){
        $.ajax({
            type : "POST",
            url  : "<?=base_url('admin/products/delete')?>",
            dataType : "JSON",
            data : {sizeid:size, productimageid:image},
            success: function(data){
              $("#row-"+id).fadeOut( "slow", function() {
                $(this).remove();
              });
              $('#deleteModal').modal('hide');
              Swal.fire("Good job!", 'Data Berhasil disimpan', 'success'); 
            },
            error       : function (xhr, ajaxOptions, thrownError) {
              Swal.fire("ERROR", xhr.responseText, 'error'); 
            }
        });
      });
    }
  </script>

</body>

</html>

