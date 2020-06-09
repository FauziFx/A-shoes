<?php

class Overview extends CI_Controller 
{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('statusadmin') != 'login') redirect(base_url('admin/auth'));
	}

  public function index()
  {
  	$this->load->view('admin/overview');
  }
}