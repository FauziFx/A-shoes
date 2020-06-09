<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
    }

    public function index()
    {
        if($this->session->userdata('statusadmin') == 'login') redirect(base_url('admin'));   
        // jika form login disubmit
        if($this->input->post()){
            if($this->admin_model->doLogin()){
                redirect(base_url('admin'));
            }else{
                $this->session->set_flashdata('msg', 'Username atau Password Anda salah');
            }
        }

        // tampilkan halaman login
        $this->load->view("admin/login_page.php");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }

}