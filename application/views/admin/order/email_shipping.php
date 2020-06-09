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
    <div style='font-size:18px;color:#007bff;text-align:center;padding:0 30px;margin-bottom:10px;line-height:18px'><b>Horee.. Pesananmu sudah dikirim</b>
    </div>
  </div>
  <br><strong>Berikut adalah detail order : </strong><br><br>
  <table cellpadding='0' cellspacing='0' style='font:14px Arial;margin-bottom:20px'>
    <tbody>
      <tr>
        <td valign='top' style='padding:5px 0'><b>Kurir</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0;text-transform: uppercase;'><?=$order->courir?></td>
      </tr>
      <tr>
        <td valign='top' style='padding:5px 0'><b>No Resi</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0;text-transform: uppercase;'><?=$order->resi?></td>
      </tr>
      <tr>
        <td valign='top' style='padding:5px 0'><b>Nama</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0'><?=$user->name?></td>
      </tr>
      <tr>
        <td valign='top' style='padding:5px 0'><b>Alamat</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0'><?=$order->address?></td>
      </tr>
      <tr>
        <td valign='top' style='padding:5px 0'><b>Telepon</b></td>
        <td valign='top' style='padding:5px'>:</td>
        <td valign='top' style='padding:5px 0'><?=$user->no_hp?></td>
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