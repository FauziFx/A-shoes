<?php
class Profile extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		$this->load->model('user_model');
		$this->load->model('order_model');
		if($this->session->userdata('statususer') != 'login') redirect(base_url());
	}

	public function index(){
		$user  = $this->user_model;
		$about = $this->about_model;
		$order = $this->order_model;
		$userid= $this->session->userdata('userid');
		$data['user']	 = $user->get_by_id($userid);
		$data['about'] = $about->get_about();
		$data['allorder'] = $order->get_order($userid);
    $this->load->view("user/profile", $data);
	}

	public function update(){
		$user = $this->user_model;
		$this->form_validation->set_rules($user->rules_update());
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'Validation Form update error');
			$this->index();
		}else{
			if($user->update()){
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect(base_url('users/profile?menu=myaccount'));
			}
		}
	}

	public function changepassword(){
		$user = $this->user_model;
		if($user->cek_oldpass()){
			$this->form_validation->set_rules($user->rules_password());
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error', 'Confirm Password Salah');
				$this->index();
			}else{
				if($user->update_password()){
					$session = array('userid','username','name','email','no_hp','statususer');
					$this->session->unset_userdata($session);
					redirect(base_url('users/auth'));
				}
			}
		}else{
			$this->session->set_flashdata('error', 'Password lama salah!');
			redirect(base_url('users/profile?menu=changepassword'));
		}
	}	

}
