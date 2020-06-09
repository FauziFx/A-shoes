  <!--View Order -->
  <div class="modal fade" id="userView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="<?=base_url('admin/users/edit')?>">
        <div class="modal-body">
          <input type="hidden" id="_userids" name='userid'>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-user"></i></div>
            </div>
            <input name="username" type="text" class="form-control" placeholder="Username" required autofocus="" id="_usernames" readonly="">
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-address-card"></i></div>
            </div>
            <input name="email" type="email" class="form-control" placeholder="Email Address" required id="_emails">
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-envelope"></i></div>
            </div>
            <input name="name" type="text" class="form-control" placeholder="Full Name" required id="_names">
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-phone"></i></div>
            </div>
            <input name="nohp" type="text" class="form-control" placeholder="No Hp" maxlength="13" required id="_no_hps">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--View Order -->
  <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Payment</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" readonly="" id="__orderid" class="form-control text-uppercase text-center mx-auto" style="width: 250px">
          <div class="text-center">
            <button id="copy" class="btn btn-sm btn-light p-0">
              <i class="fas fa-copy"></i>  Copy to clipboard
            </button>
          </div>

          <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px'>
            <tbody>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Name</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="__name"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Email</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="__email"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Transfer Date</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="__payment_date"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Amount Payment</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="__total_payment"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Destination Bank</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="__destination_bank"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Rekening Name</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="__rekening_name"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Additional Messsage</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="__message"></td>
              </tr>
            </tbody>
          </table>
          <div class="text-center">
            <img src="" alt="" id="__image" style="width: 70%;">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Input Resi -->
<div class="modal fade" id="shippingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input No Resi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?=base_url('admin/orders/shipping')?>" method="post">
        <div class="modal-body">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">No. Resi</div>
            </div>
            <input type="text" name="resi" class="form-control" placeholder="" required="">
            <input type="hidden" name="orderid">
            <input type="hidden" name="user_id">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Shipping</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <!--View Order -->
  <div class="modal fade" id="viewOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Order</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" readonly="" id="_orderid" class="form-control text-uppercase text-center mx-auto" style="width: 250px">

          <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px'>
            <thead id="shipping">
              <tr>
                <td valign='top' style='padding:5px 0'><b>Kurir</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' class="text-uppercase" id="_courir"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>No. Resi</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' class="text-uppercase" id="_resi"></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td valign='top' style='padding:5px 0'><b>UserID</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' class="text-uppercase" id="_userid"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Nama</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="_name"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Alamat</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="_address"></td>
              </tr>
              <tr>
                <td valign='top' style='padding:5px 0'><b>Telepon</b></td>
                <td valign='top' style='padding:5px'>:</td>
                <td valign='top' style='padding:5px 0' id="_no_hp"></td>
              </tr>
            </tbody>
          </table>
          
          <div class="table-responsive">
            <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px;width:100%'>
              <thead>
                <tr>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;color:#007bff'>
                    <b>NAMA BARANG</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:center;color:#007bff'>
                    <b>QTY</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:right;color:#007bff'>
                    <b>HARGA</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:right;color:#007bff'>
                    <b>TOTAL</b>
                  </td>
                </tr>
              </thead>
              <tbody id="order_detail">
                <!-- order_detail -->
                <tr>
                  <td style='padding:8px 5px;border-top:2px solid #ccc;color:#007bff' colspan='3'>
                    <b>TOTAL</b>
                  </td>
                  <td style='padding:5px;border-top:2px solid #ccc;text-align:right'>
                    <b id='_subtotal'></b>
                  </td>
                </tr>
                <tr>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;color:#007bff' colspan='3'>
                    <b>ONGKOS KIRIM</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:right'>
                    <b id="_shipping_cost"></b>
                  </td>
                </tr>
                <tr>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;color:#007bff' colspan='3'>
                    <b>TOTAL KESELURUHAN</b>
                  </td>
                  <td style='padding:8px 5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right'>
                    <b id="_grand_total"></b>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

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
          <a class="btn btn-danger" href="<?=base_url('admin/auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

<!-- Detail Product Modal -->
  <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="category"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <!-- Carousel -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" id="image1">
                  <img class="d-block w-100" src="" alt="First slide" id="img1">
                </div>
                <div class="carousel-item" id="image2">
                  <img class="d-block w-100" src="" alt="Second slide" id="img2">
                </div>
                <div class="carousel-item" id="image3">
                  <img class="d-block w-100" src="" alt="Third slide" id="img3">
                </div>
                <div class="carousel-item" id="image4">
                  <img class="d-block w-100" src="" alt="fourth slide" id="img4">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- ./Carousel -->
            <div class="card-body">
              <h5 class="card-title" id="product_name"></h5>
              <p href="#" class="btn btn-success" id="price"></p>
            </div>
          </div>
          <h5>Stock :</h5>
          <table class="table table-hover">
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
                <td id="eur_38"></td>
                <td id="eur_39"></td>
                <td id="eur_40"></td>
                <td id="eur_41"></td>
                <td id="eur_42"></td>
                <td id="eur_43"></td>
                <td id="eur_44"></td>
              </tr>
            </tbody>
          </table>
          <h5>Description :</h5>
          <p id="description"></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>