<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head") ?>
  <style>
    .row .form-inline .form-control{
      width: 100%;
    }
  </style>
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
          <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
              <?=$this->session->flashdata('error')?>
            </div>
          <?php endif; ?>
          <!-- Content Row -->
          <div class="card mb-3">
            <div class="card-header">
              <a href="<?=base_url('admin/products')?>">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="category" class="col-md-2 mt-1">Category*</label>
                  <div class="col-md-10">
                    <select name="category" id="" class="custom-select" autofocus="" required>
                      <option value="0" selected="">--Select Category--</option>
                      <?php foreach ($category as $cat):?>
                        <option value="<?=$cat->categoryid?>"><?=$cat->category?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="invalid-feedback">
                    <?=form_error('category')?>  
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-md-2 mt-1">Product Name*</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="product_name" placeholder="Product Name" required>
                  </div>
                  <div class="invalid-feedback">
                    <?=form_error('product_name')?>  
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="lensa" class="col-md-2 mt-1">Price*</label>
                  <div class="input-group col-md-10">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="number" class="form-control" name="price" placeholder="Price" required>
                  </div>
                  <div class="invalid-feedback">
                    <?=form_error('price')?>  
                  </div>
                </div>

                <div class="form-group row">
                  <label for="stock" class="col-md-2 mt-1">Stock*</label>
                  <div class="input-group col-md-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">38</span>
                    </div>
                    <input type="number" class="form-control" name="eur_38" placeholder="0" min="0" max="500" required value="0">
                  </div>
                  <div class="input-group col-md-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">39</span>
                    </div>
                    <input type="number" class="form-control" name="eur_39" placeholder="0" min="0" max="500" required value="0">
                  </div>
                  <div class="input-group col-md-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">40</span>
                    </div>
                    <input type="number" class="form-control" name="eur_40" placeholder="0" min="0" max="500" required value="0">
                  </div>
                  <div class="input-group col-md-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">41</span>
                    </div>
                    <input type="number" class="form-control" name="eur_41" placeholder="0" min="0" max="500" required value="0">
                  </div>
                  <div class="input-group col-md-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">42</span>
                    </div>
                    <input type="number" class="form-control" name="eur_42" placeholder="0" min="0" max="500" required value="0">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="lensa" class="col-md-2 mt-1">Stock*</label>
                  <div class="input-group col-md-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">43</span>
                    </div>
                    <input type="number" class="form-control" name="eur_43" placeholder="0" min="0" max="500" required value="0">
                  </div>
                  <div class="input-group col-md-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">44</span>
                    </div>
                    <input type="number" class="form-control" name="eur_44" placeholder="0" min="0" max="500" required value="0">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-md-2">Description*</label>
                  <div class="col-md-10">
                    <textarea name="description" class="form-control" id="" cols="30" rows="6" placeholder="Description" required=""></textarea>
                  </div>
                  <div class="invalid-feedback">
                    <?=form_error('description')?>  
                  </div>
                </div>
           
                <div class="form-group row">
                  <label for="stock" class="col-md-2 mt-3">Image*</label>
                  <div class="col-md-10 form-inline form-row">
                    <div class="col-md-6">
                      <input type="file" class="form-control-file mb-2" name="files[]" multiple="" required>
                    </div>
                  </div>
                </div>
                <input type="hidden" value="1" name="countfile">
                <input type="submit" class="btn btn-success" value="Save" name="btn">
              </form>

            </div>
            <div class="card-footer small text-danger">
              * Required Fields
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
    $(document).ready(function(){
      $("input[type = 'submit']").click(function(){
         var $fileUpload = $("input[type='file']");
         if (parseInt($fileUpload.get(0).files.length) > 4){
            alert('upload a maximum of 4 files');
            return false;
         }else if(parseInt($fileUpload.get(0).files.length) < 4){
            alert('upload a minimum of 4 files');
            return false;
         }
         $img1 = $fileUpload[0].files[0].size;
         $img2 = $fileUpload[0].files[1].size;
         $img3 = $fileUpload[0].files[2].size;
         $img4 = $fileUpload[0].files[3].size;
         $size = 550000;
         if($img1 > $size || $img2 > $size || $img3 > $size || $img4 > $size){
          alert('Maximum file size 500KB');
          return false;
         }

      });
    });
  </script>
</body>

</html>

