<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model
{
    private $_table = "tbl_payment";

    public function rules(){
      return [
        [
          'field'=>'name',
          'label'=>'Name',
          'rules'=>'required'
        ],
        [
          'field'=>'email',
          'label'=>'Email',
          'rules'=>'required'
        ],
        [
          'field'=>'payment_date',
          'label'=>'Payment Date',
          'rules'=>'required'
        ],
        [
          'field'=>'total_payment',
          'label'=>'Amount Payment',
          'rules'=>'required'
        ],
        [
          'field'=>'destination_bank',
          'label'=>'Destination Bank',
          'rules'=>'required'
        ],
        [
          'field'=>'rekening_name',
          'label'=>'Rekening Name',
          'rules'=>'required'
        ],
        [
          'field'=>'order_id',
          'label'=>'Invoice Number',
          'rules'=>'required'
        ]
      ];
    }

    public function get_all($status=null){
      if($status != null){
        $this->db->where('status', $status);
      }
      return $this->db->get($this->_table)->result();
    }

    public function save(){
      $post = $this->input->post();
      $data = array(
            'name'             =>$post['name'],
            'email'            =>$post['email'],
            'payment_date'     =>$post['payment_date'],
            'total_payment'    =>$post['total_payment'],
            'destination_bank' =>$post['destination_bank'],
            'rekening_name'    =>$post['rekening_name'],
            'order_id'         =>$post['order_id'],
            'message'          =>$post['message'],
            'image'            =>$this->_uploadImage()
      );

      $this->db->set($data);
      return $this->db->insert($this->_table);

		}

    private function _uploadImage(){
        $config['upload_path']          = './upload/payment/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']            = true;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return $this->upload->display_errors();
    }

    public function update($id, $status){
      $this->db->set('status', $status);
      $this->db->where('paymentid', $id);

      return $this->db->update($this->_table);
    }

    public function delete($id){
      if($this->delete_image($id)){
        $this->db->where('paymentid', $id);
        return $this->db->delete($this->_table);
      }
    }

    private function delete_image($id){
      $this->db->where('paymentid', $id);
      $img = $this->db->get($this->_table)->row();
      if($img){
        if($img->image != null) unlink(FCPATH . 'upload/payment/' . $img->image);
        return true;
      }
      return false;
    }
}