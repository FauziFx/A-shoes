<div style='margin:auto;display:table;width:800px;background:#fbfbfb'>
  <div style='display:block;border-bottom:5px solid #007bff;background:#333;padding:15px 0;text-align:center'>
    <h1 style='font-weight: bold; color: white'>A-Shoes</h1>
  </div>
  <div style='display:block;font:12px Arial;color:#333;padding:20px'>
    <div style='text-align: center'>Nomor Invoice:</div>
    <div style='font-size:25px;display:block;margin-bottom:20px;color:#007bff;text-align: center;text-transform: uppercase;'>
      <?=$order->orderid?>
    </div>
    <div style='display:block;font-size:35px;color:#007bff'># <span style='float:right'>#</span></div>
    <div style='font-size:14px;color:#007bff;text-align:center;padding:0 30px;margin-bottom:10px;line-height:18px'>
      Agar pesanan dapat kami proses dengan cepat. Kami berharap membayar sesuai dengan <b>TOTAL KESELURUHAN (<?=rupiah($amount=$order->total+$order->shipping_cost)?>)</b>
    </div>
    <div style='display:table;width:100%;text-align:center;padding:10px 0 20px 0;line-height:16px'><div style='display:block;margin-bottom:15px'>
      <b>
        lakukan pembayaran melewati Bank dibawah ini:
      </b>
    </div>
    <table cellpadding='0' cellspacing='0' style='font-size:14px;text-align:left;width:100%;border-top:1px solid #ccc'>
      <tbody>
        <tr>
          <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
            BCA
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px'>
            <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
            847xxxxxxx
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px 0'>
            <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
            John Doe
          </td>
        </tr>
        <tr>
          <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
          BNI
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px'>
          <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
          050xxxxxxx
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px 0'>
          <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
          John Doe
          </td>
        </tr>
        <tr>
          <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
          BRI
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px'>
          <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
          2058xxxxxxxxxx
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px 0'>
          <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
          John Doe
          </td>
        </tr>
        <tr>
          <td style='border-bottom:1px solid #ccc;padding:5px 0;font-size:18px'>
          MANDIRI
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px'>
          <b style='display:block;font-size:10px;color:#007bff'>Nomor :</b>
          1300xxxxxxxxx
          </td>
          <td style='border-bottom:1px solid #ccc;padding:5px 0'>
          <b style='display:block;font-size:10px;color:#007bff'>Atas Nama :</b>
          John Doe
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br><strong>Berikut adalah detail order : </strong><br><br>
  <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px'>
    <tbody>
      <tr>
        <td valign='top' style='padding:5px 0'><b>Nama</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0'><?=$this->session->userdata('name')?></td>
      </tr>
      <tr>
        <td valign='top' style='padding:5px 0'><b>Alamat</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0'><?=$order->address?></td>
      </tr>
      <tr>
        <td valign='top' style='padding:5px 0'><b>Telepon</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0'><?=$this->session->userdata('no_hp')?></td>
      </tr>
    </tbody>
  </table>
  <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px;width:100%'>
    <tbody>
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
    <?php foreach($detail as $item): ?>
      <tr>
        <td valign='top' style='padding:8px 5px;border-top:1px solid #ccc'>
          <b><?=$item->product_name?></b> (Size:<?=$item->sizes?>)
        </td>
        <td valign='top' style='padding:8px 5px;border-top:1px solid #ccc;text-align:center'>
          <?=$item->qty?>
        </td>
        <td valign='top' style='padding:8px 5px;border-top:1px solid #ccc;text-align:right'>
          <?=rupiah($item->price)?>
        </td>
        <td valign='top' style='padding:8px 5px;border-top:1px solid #ccc;text-align:right'>
          <?=rupiah($item->total)?>
        </td>
      </tr>
    <?php endforeach; ?>
      <tr>
        <td style='padding:8px 5px;border-top:2px solid #ccc;color:#007bff' colspan='3'>
          <b>TOTAL</b>
        </td>
        <td style='padding:5px;border-top:2px solid #ccc;text-align:right'>
          <b><?=rupiah($order->total)?></b>
        </td>
      </tr>
      <tr>
        <td style='padding:8px 5px;border-top:1px solid #ccc;color:#007bff' colspan='3'>
          <b>ONGKOS KIRIM</b>
        </td>
        <td style='padding:8px 5px;border-top:1px solid #ccc;text-align:right'>
          <b><?=rupiah($order->shipping_cost)?></b>
        </td>
      </tr>
      <tr>
        <td style='padding:8px 5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;color:#007bff' colspan='3'>
          <b>TOTAL KESELURUHAN</b>
        </td>
        <td style='padding:8px 5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right'>
          <b><?=rupiah($amount=$order->total+$order->shipping_cost)?></b>
        </td>
      </tr>
    </tbody>
  </table>
  <div style='display:block;text-align:center;line-height:16px'>
    Maksimal batas pembayaran adalah 1x24 jam sebelum tanggal <b style="color: #007bff; font-size: 16px">
    <?php 
      $timestamp = strtotime($order->expire_date);
      echo date('d-m-Y H:i:s', $timestamp);
    ?></b>. 
    Jika dalam waktu 1x24 jam  belum melakukan pembayaran, maka pesanan akan dianggap hangus/batal.
    <br><br>
    Jika sudah melakukan pembayaran, harap segera konfirmasi atau klik tombol konfirmasi di bawah ini :
    <br><br>
    <a href='<?=base_url('payment_confirmation')?>' style='color:#fff;display:inline-block;padding:7px 15px 5px 15px;border:2px solid #007bff;color:#007bff;font-size:16px;font-weight:700;text-decoration:none' target='_blank'>KONFIRMASI PEMBAYARAN</a>
    <br><br>
    
    Hormat kami,<br>
    <b style='color:#007bff'>A-Shoes Footwear</b>
    <br><br>
  </div>
</div>
  <div style='display:block;border-top:5px solid #007bff;background:#333;padding:15px 0;text-align:center;font:10px arial;color:#fff;line-height:14px'>
    <strong style='font-size:18px;color:#007bff'>A-Shoes Footwear</strong>
  </div>
</div>