<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('_partials/head') ?>
</head>
<body>
<?php $this->load->view('_partials/navbar') ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4"><?=$about->name?></h1>

        <?php 
          $statususer = $this->session->userdata('statususer');
          if(isset($statususer)): 
        ?>
        <div class="list-group">
          <li class="list-group-item">
            <a href="<?=base_url('users/profile')?>" style="text-decoration: none;">
              Transaction <span class="badge badge-primary text-right"><?=count($order)?></span>
            </a>
          </li>
        </div>
        <?php endif; ?>

        <br>

        <div class="list-group">
          <li class="list-group-item"><h4><b>Category</b></h4></li>
          <?php foreach ($category as $cat): ?>
          <form action="" method="post">
            <input type="hidden" value="<?=$cat->categoryid?>" name="bycategory">
            <input type="hidden" value="<?=$cat->category?>" name="_category">
            <input type="submit" class="form-control btn-sm" value="<?=$cat->category?>">
          </form>
          <?php endforeach; ?>
        </div>
        
        <br>

        <div class="list-group">
          <li class="list-group-item"><h4><b>Shopping Cart</b></h4></li>
          <?php if ($cart = $this->cart->contents()):?>
            <li class="list-group-item">
            <?php foreach ($cart as $item): ?>
              <?=$item['name']." <b>x".$item['qty']?></b><br>
            <?php endforeach; ?>
            </li>  
          <?php else: ?>
            <li class="list-group-item">Cart Empty</li>
          <?php endif; ?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <div class="carousel-inner">
            <?php 
            $i = 0;
            foreach ($gallery as $img):
             $i++
            ?>
            <div class="carousel-item <?php if($i == 1) echo'active';?>">
              <img class="d-block w-100" src="<?=base_url('upload/gallery/'.$img->image)?>">
            </div>
            <?php endforeach; ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <h1 class="text-center">
          List Product
          <?php 
            $_category = $this->input->post('_category');
            $_search = $this->input->post('search');
            if(isset($_category)){
              echo '"'.$_category.'"';
            }elseif (isset($_search)) {
              echo '"'.$_search.'"';
            }
          ?>
        </h1><hr>
        <div class="row">
        <?php foreach($product as $row): ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?=base_url('home/product/'.$row->productid)?>"><img class="card-img-top" src="<?=base_url('upload/product/'.$row->image1)?>" alt=""></a>
              <div class="card-body">
                <form action="<?=base_url('shopping/add_cart')?>" method="post" accept-charset="utf-8">
                <h4 class="card-title">
                  <a href="<?=base_url('home/product/'.$row->productid)?>"><?=$row->product_name?></a>
                </h4>
                <h5 class="text-success"><?=rupiah($row->price)?></h5>
                <a href="<?=base_url('home/product/'.$row->productid)?>" class="btn btn-dark">
                  <i class="fas fa-search">&nbsp;</i>
                  Detail
                </a>
                
                <input type="hidden" name="id" value="<?=$row->productid?>">
                <input type="hidden" name="name" value="<?=$row->product_name?>">
                <input type="hidden" name="price" value="<?=$row->price?>">
                <input type="hidden" name="size" value="">
                <input type="hidden" name="image" value="<?=$row->image1?>">
                <input type="hidden" name="qty" value="1">
                <input type="hidden" name="eur_38" value="<?=$row->eur_38?>">
                <input type="hidden" name="eur_39" value="<?=$row->eur_39?>">
                <input type="hidden" name="eur_40" value="<?=$row->eur_40?>">
                <input type="hidden" name="eur_41" value="<?=$row->eur_41?>">
                <input type="hidden" name="eur_42" value="<?=$row->eur_42?>">
                <input type="hidden" name="eur_43" value="<?=$row->eur_43?>">
                <input type="hidden" name="eur_44" value="<?=$row->eur_44?>">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-shopping-cart">&nbsp;</i>
                  Buy
                </button>
                </form>
              </div>
              <div class="card-footer text-muted">
                <small>
                <?php  
                  echo $eur_38 = ($row->eur_38 == 0) ? '<s>38</s> | ' : '38 | ';
                  echo $eur_39 = ($row->eur_39 == 0) ? '<s>39</s> | ' : '39 | ';
                  echo $eur_40 = ($row->eur_40 == 0) ? '<s>40</s> | ' : '40 | ';
                  echo $eur_41 = ($row->eur_41 == 0) ? '<s>41</s> | ' : '41 | ';
                  echo $eur_42 = ($row->eur_42 == 0) ? '<s>42</s> | ' : '42 | ';
                  echo $eur_43 = ($row->eur_43 == 0) ? '<s>43</s> | ' : '43 | ';
                  echo $eur_44 = ($row->eur_44 == 0) ? '<s>44</s>' : '44';
                ?>
                </small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
        <!-- /.row -->

        <!-- Pagination -->
        <div class="row">
          <?=$pagination;?>
        </div>

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php $this->load->view('_partials/footer') ?> 
<!-- JS -->
<?php $this->load->view('_partials/js') ?>
</body>
</html>