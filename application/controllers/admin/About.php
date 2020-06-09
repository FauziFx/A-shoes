<?php 

class About extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}
	
	public function index(){
		$data['gallery'] = $this->about_model->get_gallery();
		$data['about'] = $this->about_model->get_about();
		$this->load->view('admin/about/about', $data);
	}

	public function add_gallery(){
		if(isset($_FILES['image']['name'])){
			$about = $this->about_model;
			$about->save_gallery();
			$this->session->set_flashdata('success', 'berhasil disimpan');
		}
		$this->load->view('admin/about/new_form');
	}

	public function edit(){
		$about = $this->about_model;
		$validation = $this->form_validation;
		$validation->set_rules($about->rules());

		if($validation->run()){
			$about->update();
			$this->session->set_flashdata('editabout', 'berhasil disimpan');
		}
		$data['about'] = $about->get_about();
		$this->load->view('admin/about/edit_about', $data);
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if($this->about_model->delete($id)){
			$this->session->set_flashdata('successdelete', 'berhasil Dihapus');
			redirect('admin/about');
		}
	}


}
