<?php
class Payment_confirmation extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		$this->load->model('payment_model');
	}

	public function index(){
		$about = $this->about_model;
		$data['about'] = $about->get_about();

		$payment  = $this->payment_model;
		$validation = $this->form_validation;
		$validation->set_rules($payment->rules());
		if($validation->run()){
			if($payment->save()){
				$this->session->set_flashdata('payment',$this->input->post('order_id'));
		    redirect(base_url('payment_confirmation/payment_success'));
			}
		}
    $this->load->view("payment_confirmation", $data);
	}

	public function payment_success(){
		if(!$this->session->flashdata('payment')) redirect(base_url('payment_confirmation'));
		$about = $this->about_model;
		$data['about'] = $about->get_about();
		$this->load->view("payment_success", $data);
	}

}