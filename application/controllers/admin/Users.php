<?php 

class Users extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}
	
	public function index(){
		$user = $this->user_model;
		$data['users'] = $user->get_all();
		$this->load->view('admin/users/list', $data);
	}

	public function edit(){
		$user = $this->user_model;
		$userid = $this->input->post('userid');
		$update  = $user->update($userid);
		if($update){
			$this->session->set_flashdata('success', 'Data Berhasil diupdate');
			redirect(base_url('admin/users'));
		}
	}

	public function delete($userid){
		$user = $this->user_model;
		$delete  = $user->delete($userid);
		if($delete){
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
			redirect(base_url('admin/users'));
		}
	}

}
