<?php 

class Category extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}
	
	public function index(){
		$data['category'] = $this->category_model->get_all();
		$this->load->view('admin/category/list', $data);
	}

	public function add(){
		$category = $this->category_model;
		$validation = $this->form_validation;
		$validation->set_rules($category->rules());

		if($validation->run()){
			$category->save();
			$this->session->set_flashdata('success', 'berhasil disimpan');
		}
		$this->load->view('admin/category/new_form');
	}

	public function edit($id=null){
		if(!isset($id)) redirect('admin/category');

		$category = $this->category_model;
		$validation = $this->form_validation;
		$validation->set_rules($category->rules());

		if($validation->run()){
			$category->update();
			$this->session->set_flashdata('success', 'berhasil disimpan');
		}
		$data['category'] = $category->get_by_id($id);
		if(!$data['category']) show_404();

		$this->load->view('admin/category/edit_form', $data);
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if($this->category_model->delete($id)){
			redirect('admin/category');
		}
	}
}
