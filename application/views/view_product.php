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
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Product</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$product->product_name?></li>
    </ol>

    <div class="row">

      <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide my-2 mx-2" data-ride="carousel">
              <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?=base_url('upload/product/'.$product->image1)?>">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=base_url('upload/product/'.$product->image2)?>">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=base_url('upload/product/'.$product->image3)?>">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=base_url('upload/product/'.$product->image4)?>">
                </div>
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
          </div>
        
        </div>
  
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-8">
        
      <form action="<?=base_url('shopping/add_cart')?>" method="post" accept-charset="utf-8">

        <div class="card">
          <div class="card-body">
            <h2><?=$product->product_name?></h2>
            <hr>
            <h3 class=text-primary><?=rupiah($product->price)?></h3>
            <h5>Category : <small><?=$product->category?></small></h5>
            <h4>Stock Info</h4>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>38</th>
                  <th>39</th>
                  <th>40</th>
                  <th>41</th>
                  <th>42</th>
                  <th>43</th>
                  <th>44</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php 
                  echo $eur_38 = ($product->eur_38 == 0) ? '<td class="text-danger">'.$product->eur_38.'</td>' : '<td class="text-success">'.$product->eur_38.'</td>';
                  echo $eur_39 = ($product->eur_39 == 0) ? '<td class="text-danger">'.$product->eur_39.'</td>' : '<td class="text-success">'.$product->eur_39.'</td>';
                  echo $eur_40 = ($product->eur_40 == 0) ? '<td class="text-danger">'.$product->eur_40.'</td>' : '<td class="text-success">'.$product->eur_40.'</td>';
                  echo $eur_41 = ($product->eur_41 == 0) ? '<td class="text-danger">'.$product->eur_41.'</td>' : '<td class="text-success">'.$product->eur_41.'</td>';
                  echo $eur_42 = ($product->eur_42 == 0) ? '<td class="text-danger">'.$product->eur_42.'</td>' : '<td class="text-success">'.$product->eur_42.'</td>';
                  echo $eur_43 = ($product->eur_43 == 0) ? '<td class="text-danger">'.$product->eur_43.'</td>' : '<td class="text-success">'.$product->eur_43.'</td>';
                  echo $eur_44 = ($product->eur_44 == 0) ? '<td class="text-danger">'.$product->eur_44.'</td>' : '<td class="text-success">'.$product->eur_44.'</td>';   
                ?>
                </tr>
              </tbody>
            </table>
            <div class="row">
              <div class="col mx-auto">
                <input type="hidden" name="id" value="<?=$product->productid?>">
                <input type="hidden" name="name" value="<?=$product->product_name?>">
                <input type="hidden" name="price" value="<?=$product->price?>">
                <input type="hidden" name="image" value="<?=$product->image1?>">
                <input type="hidden" name="qty" value="1">
                <input type="hidden" name="eur_38" value="<?=$product->eur_38?>">
                <input type="hidden" name="eur_39" value="<?=$product->eur_39?>">
                <input type="hidden" name="eur_40" value="<?=$product->eur_40?>">
                <input type="hidden" name="eur_41" value="<?=$product->eur_41?>">
                <input type="hidden" name="eur_42" value="<?=$product->eur_42?>">
                <input type="hidden" name="eur_43" value="<?=$product->eur_43?>">
                <input type="hidden" name="eur_44" value="<?=$product->eur_44?>">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                  <i class="fas fa-shopping-cart"></i> Buy This Product
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

      </form>

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

    <!-- Description -->
    <div class="row my-2"> 
      <div class="col-md-8 offset-md-4 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Description Product</h4>
          </div>
          <div class="card-body">
            <p>
              <?=$product->description?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- ./row-->

    <!-- row random product-->
    <div class="row mb-4">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Other Product</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <?php foreach($random as $row): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card h-100">
                    <a href="<?=base_url('home/product/'.$row->productid)?>"><img class="card-img-top" src="<?=base_url('upload/product/'.$row->image1)?>" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="<?=base_url('home/product/'.$row->productid)?>"><?=$row->product_name?></a>
                      </h4>
                      <h5 class="text-success"><?=rupiah($row->price)?></h5>
                    </div>
                    <div class="card-footer text-muted">
                      <?php  
                        echo $eur_38 = ($row->eur_38 == 0) ? '<s>38</s> | ' : '38 | ';
                        echo $eur_39 = ($row->eur_39 == 0) ? '<s>39</s> | ' : '39 | ';
                        echo $eur_40 = ($row->eur_40 == 0) ? '<s>40</s> | ' : '40 | ';
                        echo $eur_41 = ($row->eur_41 == 0) ? '<s>41</s> | ' : '41 | ';
                        echo $eur_42 = ($row->eur_42 == 0) ? '<s>42</s> | ' : '42 | ';
                        echo $eur_43 = ($row->eur_43 == 0) ? '<s>43</s> | ' : '43 | ';
                        echo $eur_44 = ($row->eur_44 == 0) ? '<s>44</s>' : '44';
                      ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ./row random -->

  </div>
  <!-- /.container -->
<?php $this->load->view('_partials/footer') ?> 
<!-- JS -->
<?php $this->load->view('_partials/js') ?>
</body>
</html>