<?php
class Transaction extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		if($this->session->userdata('statususer') != 'login') redirect(base_url());
	}

	public function index(){
		redirect(base_url('users'));
	}

	public function get_order_detail($orderid){
		$order = $this->order_model;
		$data  = $order->get_detail($orderid);
		echo json_encode($data);
	}

	public function receive($orderid){
		$order = $this->order_model;
		if($order->update($orderid, '3')){
			$this->session->set_flashdata('success', 'Thank you for confirmation');
			redirect(base_url('users/profile'));
		}
	}

}
