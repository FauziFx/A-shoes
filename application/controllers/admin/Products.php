<?php 

class Products extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}
	
	public function index(){
		$data['products'] = $this->product_model->get_all();
		$this->load->view('admin/product/list', $data);
	}

	public function add(){
		$product = $this->product_model;

		$validation = $this->form_validation;
		$validation->set_rules($product->rules());

		if($validation->run()){
			$product->save_product();
			$this->session->set_flashdata('success', 'berhasil disimpan');
		}

		$data['category'] = $this->category_model->get_all();
		$this->load->view('admin/product/new_form', $data);
	}

	public function edit($id=null){
		if(!isset($id)) redirect('admin/products');

		$product = $this->product_model;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());
		if($validation->run()){
			$product->update_product();
			$this->session->set_flashdata('success', 'berhasil disimpan');
		}

		$data['category'] = $this->category_model->get_all();
		$data['products'] = $this->product_model->get_by_id($id);
		if(!$data['products']) show_404();
		$this->load->view('admin/product/edit_form', $data);
	}

	public function delete(){
		$data=$this->product_model->delete();
		echo json_encode($data);
	}
}
