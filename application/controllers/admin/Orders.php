<?php 

class Orders extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}
	
	public function index(){
		$order = $this->order_model;
		$data['order'] = $order->get_all();
		$this->load->view('admin/order/list', $data);
	}

	public function complete(){
		$order = $this->order_model;
		$data['order'] = $order->get_all('complete');
		$this->load->view('admin/order/list_complete', $data);	
	}

	public function cancel(){
		$order = $this->order_model;
		$data['order'] = $order->get_all('cancel');
		$this->load->view('admin/order/list_cancel', $data);	
	}

	public function get_order_detail($orderid){
		$order = $this->order_model;
		$data  = $order->get_detail($orderid);
		echo json_encode($data);
	}

	public function get_user($userid){
		$order = $this->user_model;
		$data  = $order->get_by_id($userid);
		echo json_encode($data);
	}

	public function shipping(){
	/*------------*/
		// $order = $this->order_model;
		// $email = $this->email_model;
		// $user  = $this->user_model;
		// $data['user'] = $user->get_by_id('5EBD4A66EAD2C');
		// $data['order'] = $order->get_order_byid('5ECB7D1CAF857');
		// $data['detail']= $order->get_detail('5ECB7D1CAF857');

		// $to = $user->get_by_id('5EBD4A66EAD2C')->email;
		// $subject = "A-Shoes On Shipping";
		// $message = $this->load->view('admin/order/email_shipping', $data);
	/*------------*/

		$order = $this->order_model;
		$email = $this->email_model;
		$user  = $this->user_model;
		$post  = $this->input->post();
		$orderid = $post['orderid'];
		$user_id = $post['user_id'];
		$resi    = $post['resi'];
		$update  = $order->update($orderid, '2', $resi);
		if($update){
			$data['user'] = $user->get_by_id($user_id);
			$data['order'] = $order->get_order_byid($orderid);
			$data['detail']= $order->get_detail($orderid);

			$to = $user->get_by_id($user_id)->email;
			$subject = "A-Shoes On Shipping";
			$message = $this->load->view('admin/order/email_shipping', $data, true);

			$email->send($to, $subject, $message);

			$this->session->set_flashdata('success', 'Data Berhasil di update');
			redirect(base_url('admin/orders'));
		}
	}

	public function receive($orderid){
		$order = $this->order_model;
		$update  = $order->update($orderid, '3');
		if($update){
			$this->session->set_flashdata('success', 'Data Berhasil di update');
			redirect(base_url('admin/orders'));
		}
	}

}
