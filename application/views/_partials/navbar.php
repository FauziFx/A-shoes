<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?=base_url()?>">
            <i class="fas fa-home"></i> Home 
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('payment_confirmation')?>">Payment Confirmation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <form class="form-inline" method="post" action="<?=base_url()?>">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" required="">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('shopping')?>">
            <i class="fas fa-shopping-cart"></i>
            Shopping Cart
            <span class="badge badge-primary"><?=count($this->cart->contents())?></span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> 
            <?php  
              $username = $this->session->userdata('username');
              echo $user = (empty($username)) ? "Register" : $username;
            ?>
          </a>
          <?php 
            $statususer = $this->session->userdata('statususer');
            if(!isset($statususer)): 
          ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?=base_url('users/auth/register')?>">Register</a>
            <a class="dropdown-item" href="<?=base_url('users/auth')?>">Login</a>
          </div>
          <?php else: ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?=base_url('users/profile')?>">Profil</a>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Log out</a>
          </div>
        <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>