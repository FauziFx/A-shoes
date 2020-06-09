<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    private $_order  = "tbl_order";
    private $_detail = "tbl_order_detail";
    private $_product= "tbl_product";

    public function rules(){
      return [
        [
          'field'=>'province',
          'label'=>'Province',
          'rules'=>'required'
        ],
        [
          'field'=>'city',
          'label'=>'City',
          'rules'=>'required'
        ],
        [
          'field'=>'courir',
          'label'=>'Courir',
          'rules'=>'required'
        ],
        [
          'field'=>'service',
          'label'=>'Service',
          'rules'=>'required'
        ],
        [
          'field'=>'address',
          'label'=>'Address',
          'rules'=>'required'
        ],
        [
          'field'=>'postalcode',
          'label'=>'Postal Code',
          'rules'=>'required'
        ]
      ];
    }

    public function save($userid){
      $post = $this->input->post();
      $prov          = explode('-',$post["province"],2);
      $city          = explode('-',$post["city"],2);
      $postalcode    = $post["postalcode"];
      $address       = $post["address"].', '.$city[1].', '.$prov[1]." ".$postalcode;
      $uuid = uniqid();
      $datetime = new DateTime();
      $datetime->modify('+1 day');
      $expire_date = $datetime->format('Y-m-d H:i:s');
      $data = array(
              'orderid'       => $uuid,
              'user_id'       => $userid,
              'expire_date'   => $expire_date,
              'courir'        => $post["courir"],
              'shipping_cost' => $post["service"],
              'address'       => $address,
              'total'         => $post["total"],
              'status'        => '1'
      );
      $this->db->set($data);
      if($this->db->insert($this->_order)){
        $this->save_detail($uuid);
        return $uuid;
      }
		}

    private function save_detail($uuid){
      if ($cart = $this->cart->contents())
      {
        foreach ($cart as $item)
        {
            $data = array(
                    'order_id'   => $uuid,
                    'product_id' => $item['id'],
                    'sizes'      => substr($item['size'],0,2),
                    'qty'        => $item['qty'],
                    'total'      => $item['subtotal']
                  );     
            $this->db->set($data);
            $this->db->insert($this->_detail);
        }
        $this->cart->destroy(); 
      }
    }

    public function get_all($status=null){
      if ($status == null) {
        $this->db->where('status', '1');
        $this->db->or_where('status', '2');
      }elseif ($status == 'shipping') {
        $this->db->or_where('status', '2');
      }elseif ($status == 'complete') {
        $this->db->or_where('status', '3');
      }else{
        $this->db->or_where('status', '4');
      }
      return $this->db->get($this->_order)->result();
    }

    public function get_order($userid=null, $status=null){
      if($userid != null){
        $this->db->where('user_id', $userid);
        if($status != null){
          if($status == 'transaction'){
            $array = array('status <=' => '2','user_id =' => $userid);
            $this->db->where($array);
          }else{
            $array = array('status =' => $status, 'user_id =' => $userid);
            $this->db->where($array);
          }
        }
      }
      return $this->db->get($this->_order)->result();
    }

    public function get_order_byid($orderid){
      return $this->db->get_where($this->_order, ['orderid'=>$orderid])->row();
    }

    public function get_detail($orderid){
      $this->db->join($this->_product, "$this->_product.productid = $this->_detail.product_id");
      $this->db->where('order_id', $orderid);
      return $this->db->get($this->_detail)->result();
    }

    public function update($orderid, $status, $resi=null){
      if($resi == null){
        $data = array('status' => $status);
      }else{
        $data = array('status' => $status, 'resi' => $resi);
      }
      $this->db->set($data);
      $this->db->where('orderid', $orderid);
      return $this->db->update($this->_order);
    }
}