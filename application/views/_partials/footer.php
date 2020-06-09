<div class="bg-primary text-light">
	<div class="container">
	<div class="row text-center">
		<div class="col-md-4 py-3">
			<img src="<?=base_url('img/bca_logo.png')?>" alt="Logo Bca" style="height: 25px;">
			<img src="<?=base_url('img/bni_logo.png')?>" alt="Logo Bni" style="height: 25px;">
			<img src="<?=base_url('img/mandiri_logo.jpg')?>" alt="Logo Mandiri" style="height: 25px;">
			<img src="<?=base_url('img/bri_logo.png')?>" alt="Logo Bri" style="height: 25px;">
		</div>
		<div class="col-md-4 py-3">
			<img src="<?=base_url('img/jne_logo.png')?>" alt="Logo Jne" style="height: 30px;">
			<img src="<?=base_url('img/pos_logo.png')?>" alt="Logo Pos" style="height: 30px;">
		</div>
		<div class="col-md-4 py-3">
			Find Us on : 
			<a class="text-light" href="<?=$about->facebook?>"><i class="fab fa-facebook-square fa-2x"></i></a>
			<a class="text-light" href="<?=$about->instagram?>"><i class="fab fa-instagram fa-2x"></i></a> 
		</div>
	</div>
	</div>
</div>
<div class="footer-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<h4 class="mb-3">About Us</h4>
				<ul class="list-unstyled">
					<li><?=$about->description?></li>
					<li>&nbsp;</li>
					<li><i class="fas fa-map-marker-alt"></i> <?=$about->address?></li>
				</ul><br>
				<!-- <h4 class="mb-3">Follow Us On</h4>
				<a href="<?=$about->facebook?>"><i class="fab fa-facebook-square fa-3x"></i></a>
				<a href="<?=$about->instagram?>"><i class="fab fa-instagram fa-3x"></i></a> -->
			</div>
			<div class="col">
				<h4 class="mb-3">Buy</h4>
				<ul class="list-unstyled">
					<li><a href="">How To Buy</a></li>
					<li><a href="">Paymenet Method</a></li>
					<li><a href="">Shipping Price</a></li>
					<li><a href="">Terms & Condition</a></li>
					<li><a href="">FAQ</a></li>
				</ul>
			</div>
			<div class="col">
				<h4 class="mb-3">Quick Menu</h4>
				<ul class="list-unstyled">
					<li><a href="">Registration</a></li>
					<li><a href="">Login</a></li>
					<li><a href="">Payment Confirmation</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<footer class="footer text-center py-3">
  <div class="container my-auto">
      <span>Copyright &copy; Your Website 2019</span>
  </div>
</footer>