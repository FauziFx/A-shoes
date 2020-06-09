<?php
class Auth extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index(){
		if($this->session->userdata('statususer') == 'login') redirect(base_url());

		if($this->input->post()){
        if($this->user_model->doLogin()){
            redirect(base_url());
        }else{
            $this->session->set_flashdata('error', 'Username or Password invalid');
        }
    }
    $this->load->view("user/login_page");
	}

	public function register(){
		if($this->session->userdata('statususer') == 'login') redirect(base_url());

		$user  = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->rules());
		if($validation->run()){
			$userid = $user->save();
			if($userid === false){
				$this->session->set_flashdata("error", "The Username or email address you have entered is already registered");
			}else{
				$this->session->set_flashdata("error", "Register Successfuly");
				redirect(base_url());
			}
		}

		$this->load->view("user/register");	
	}

	public function logout(){
		$session = array('userid','username','name','email','no_hp','statususer');
		$this->session->unset_userdata($session);
    redirect(base_url());
  }

}
