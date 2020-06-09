    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin')?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-2"><?=SITE_NAME?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Overview</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products" aria-expanded="true" aria-controls="products">
          <i class="fas fa-fw fa-boxes"></i>
          <span>Products</span>
        </a>
        <div id="products" class="collapse" aria-labelledby="products">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products:</h6>
            <a class="collapse-item" href="<?=base_url('admin/products/add') ?>">New Product</a>
            <a class="collapse-item" href="<?=base_url('admin/products') ?>">List Product</a>
            <a class="collapse-item" href="<?=base_url('admin/category') ?>">Category</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php echo $this->uri->segment(2) == 'orders' ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orders" aria-expanded="true" aria-controls="orders">
          <i class="fas fa-fw fa-list"></i>
          <span>Orders</span>
        </a>
        <div id="orders" class="collapse" aria-labelledby="orders">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders:</h6>
            <a class="collapse-item" href="<?=base_url('admin/orders') ?>">List Order</a>
            <a class="collapse-item" href="<?=base_url('admin/orders/complete') ?>">Complete Order</a>
            <a class="collapse-item" href="<?=base_url('admin/orders/cancel') ?>">Cancel Order</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php echo $this->uri->segment(2) == 'payments' ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payments" aria-expanded="true" aria-controls="payments">
          <i class="fas fa-fw fa-wallet"></i>
          <span>Payments</span>
        </a>
        <div id="payments" class="collapse" aria-labelledby="payments">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Payments:</h6>
            <a class="collapse-item" href="<?=base_url('admin/payments') ?>">List Payment</a>
            <a class="collapse-item" href="<?=base_url('admin/payments/complete') ?>">Complete Payment</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('admin/users')?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Users</span>
        </a>
      </li>

      <li class="nav-item <?php echo $this->uri->segment(2) == 'about' ? 'active' : '' ?>">
        <a class="nav-link" href="<?=base_url('admin/about') ?>">
          <i class="fas fa-fw fa-info"></i>
          <span>About</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->