<?php 

class Payments extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('payment_model');
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}
	
	public function index(){
		$payment = $this->payment_model;
		$data['payment'] = $payment->get_all('0');
		$this->load->view('admin/payment/list', $data);
	}

	public function complete(){
		$payment = $this->payment_model;
		$data['payment'] = $payment->get_all('1');
		$this->load->view('admin/payment/list_complete', $data);
	}

	public function confirm_payment($id){
		$payment = $this->payment_model;
		if($payment->update($id, '1')){
			$this->session->set_flashdata('success', 'Data Berhasil diupdate');
			redirect(base_url('admin/payments'));
		}
	}

	public function delete($id){
		$payment = $this->payment_model;
		if($payment->delete($id)){
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
			redirect(base_url('admin/payments'));
		}
	}

}
