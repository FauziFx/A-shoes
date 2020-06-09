<?php 
class profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}

	public function index(){
		$this->load->view('admin/profile/edit_form');
	}

	public function edit(){
		$profile = $this->admin_model;
		if($profile->cek_oldpass()){
			$validation = $this->form_validation;
			$validation->set_rules($profile->rules());

			if($validation->run()){
				$profile->update();
				$this->session->set_flashdata('success', 'berhasil disimpan');
				redirect('admin/profile');
			}else{
				$this->load->view('admin/profile/edit_form');
			}
		}else{
			$this->session->set_flashdata('error', 'Password lama salah!');
			redirect('admin/profile');
		}
	}
}