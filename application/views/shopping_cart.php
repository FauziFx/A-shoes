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
      <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
    </ol>

    <div class="row mb-4">
      <div class="col">
        <!-- Form Update cart -->
        <form action="<?=base_url('shopping/update_cart')?>" method="post" enctype="multipart/form-data">

        <div class="card">
          <div class="card-header">
            <h4>Shopping Cart</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <?php if ($cart = $this->cart->contents()):?>
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th><i class="fas fa-trash"></i></th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php
                  // Create form and send all values in "shopping/update_cart" function.
                  $grand_total = 0;
                  $i = 1;

                  foreach ($cart as $item):
                  $grand_total = $grand_total + $item['subtotal'];
                ?>
                <input type="hidden" name="cart[<?=$item['id']?>][id]" value="<?=$item['id']?>">
                <input type="hidden" name="cart[<?=$item['id']?>][rowid]" value="<?=$item['rowid']?>">
                <input type="hidden" name="cart[<?=$item['id']?>][name]" value="<?=$item['name']?>">
                <input type="hidden" name="cart[<?=$item['id']?>][price]" value="<?=$item['price']?>">
                  <tr>
                    <td>
                      <img src="<?=base_url('upload/product/'.$item['image'])?>" alt="" height="80px">
                    </td>
                    <td><?=$item['name']?></td>
                    <td><?=rupiah($item['price'])?></td>
                    <td>
                      <select name="cart[<?=$item['id']?>][size]" onchange="changeSize('<?=$item['id']?>')" class="form-control" id="size-<?=$item['id']?>" required>
                        <option value="" selected="">Size</option>
                       <?php 
                          if(substr($item['eur_38'],0,2) != 0){
                            echo $output = '<option value="38-'.$item['eur_38'].'"'. 
                                  ( $item['size'] == 38 ? 'selected' : '' ) . '>'
                                  . '38</option>';
                          }
                          if(substr($item['eur_39'],0,2) != 0){
                            echo $output = '<option value="39-'.$item['eur_39'].'"'. 
                                  ( $item['size'] == 39 ? 'selected' : '' ) . '>'
                                  . '39</option>';
                          }
                          if(substr($item['eur_40'],0,2) != 0){
                            echo $output = '<option value="40-'.$item['eur_40'].'"'. 
                                  ( $item['size'] == 40 ? 'selected' : '' ) . '>'
                                  . '40</option>';
                          }
                          if(substr($item['eur_41'],0,2) != 0){
                            echo $output = '<option value="41-'.$item['eur_41'].'"'. 
                                  ( $item['size'] == 41 ? 'selected' : '' ) . '>'
                                  . '41</option>';
                          }
                          if(substr($item['eur_42'],0,2) != 0){
                            echo $output = '<option value="42-'.$item['eur_42'].'"'. 
                                  ( $item['size'] == 42 ? 'selected' : '' ) . '>'
                                  . '42</option>';
                          }
                          if(substr($item['eur_43'],0,2) != 0){
                            echo $output = '<option value="43-'.$item['eur_43'].'"'. 
                                  ( $item['size'] == 43 ? 'selected' : '' ) . '>'
                                  . '43</option>';
                          }
                          if($item['eur_44'] != 0){
                            echo $output = '<option value="44-'.$item['eur_44'].'"'. 
                                  ( $item['size'] == 44 ? 'selected' : '' ) . '>'
                                  . '44</option>';
                          }
                        ?>
                      </select>
                    </td>
                    <td width="80">
                      <input class="form-control" min="1" max="1" name="cart[<?=$item['id']?>][qty]" value="<?=$item['qty']?>" type="number" id='qty-<?=$item['id']?>'>
                    </td>
                    <td><?=rupiah($item['subtotal'])?></td>
                    <td>
                      <a href="<?=base_url('shopping/delete_cart/'.$item['rowid'])?>" class="text-danger"><i class="fas fa-times-circle"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>

                </tbody>
              </table>

            </div> 
            <!-- Table-responsive -->
            <div class="d-flex justify-content-between">
              <h4>Order Total : <span class="text-success"><?=rupiah($grand_total)?></span></h4>
              <div>
                <a data-toggle="modal" data-target="#deleteCart" href="" class="btn btn-sm btn-danger my-1">
                  <i class="fas fa-trash"></i> Empty Cart
                </a>
                <button class="btn btn-sm btn-success my-1" type="submit">
                  <i class="fas fa-edit"></i> Update Cart
                </button>
                <a href="<?=base_url('shopping/check_out')?>" class="btn btn-sm btn-primary my-1">
                  <i class="fa fa-cart-arrow-down"></i> Check Out
                </a>
              </div>
              <?php else: ?>
                <h4 class="text-center my-2 text-danger">Shopping Cart is Empty <i class="fas fa-shopping-cart"></i></h4>
              <?php endif; ?>

            </div>
            <!-- Table-responsive -->
          </div>
          <!-- Card-body -->
        </div>
        <!-- card -->
        </form>
        <!-- Form update cart -->
      </div>
      <!-- col -->
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Modal -->
  <div class="modal fade" id="deleteCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Empty Shopping Cart</div>
        <form action="<?=base_url('shopping/delete_cart/all')?>" method="post">
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Yes</class>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $this->load->view('_partials/footer') ?> 
<!-- JS -->
<?php $this->load->view('_partials/js') ?>
<script>
    function changeSize(id){
      var id = id;
      var stock = $('#size-'+id).val().substring(3);
      $('#qty-'+id).attr('max', stock);
    }
</script>
</body>
</html>