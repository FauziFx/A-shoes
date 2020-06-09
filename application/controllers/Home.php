<?php
class Home extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->model('order_model');
		$this->load->model('cek_model');

		$this->cek_model->cek();
	}

	public function index(){
		//konfigurasi pagination
		$config['base_url']   = base_url('home/index'); //site url
		$config['total_rows'] = $this->db->count_all('tbl_product'); //total row

    $category = $this->input->post('bycategory');
    $search   = $this->input->post('search');
    if(isset($category) || isset($search)){
	    $config['per_page'] = 100;  //show record per halaman
	  }else{	
	    $config['per_page'] = 9;  //show record per halaman
	  }
	  
		$config["uri_segment"] = 3;  // uri parameter
		$choice                = $config["total_rows"] / $config["per_page"];
		$config["num_links"]   = floor($choice);

    // Membuat Style pagination untuk BootStrap v4
  	$config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="text-center mx-auto"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$about    = $this->about_model;
		$category = $this->category_model;
		$product  = $this->product_model;
		$order 		= $this->order_model;

		$userid = $this->session->userdata('userid');

		$data['product']    = $product->get_all($config["per_page"], $data['page']);           
		$data['pagination'] = $this->pagination->create_links();
		$data['category']   = $category->get_all();
		$data['gallery']    = $about->get_gallery();
		$data['about']      = $about->get_about();
		$data['order']			= $order->get_order($userid, 'transaction');
		$this->load->view('homepage', $data);
	}

	public function product($id=null){
		$about    = $this->about_model;
		$category = $this->category_model;
		$product  = $this->product_model;
		$data['about']    = $about->get_about();
		$data['category'] = $category->get_all();
		$data['product']  = $product->get_by_id($id);
		$data['random']   = $product->get_random();
		$this->load->view('view_product', $data);
	}
}
