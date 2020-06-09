<?php

class Admin_model extends CI_Model
{
    private $_table = "tbl_admin";

    public function rules(){
    	return [
				[
					'field'=>'old_pass',
					'label'=>'Old Password',
					'rules'=>'required'
				],
				[
					'field'=>'new_pass',
					'label'=>'New Password',
					'rules'=>'required|min_length[5]'
				],
				[
					'field'=>'renew_pass',
					'label'=>'Retype New Password',
					'rules'=>'required|matches[new_pass]|min_length[5]'
				]
			];
    }

    public function doLogin(){
    	$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->db->where('username', $username);
			$user = $this->db->get($this->_table)->row();
			if($user){
	 			$isPasswordTrue = password_verify($password, $user->password);
	 			if($isPasswordTrue){
					$data_session = array(
						'usernameadmin' => $username,
						'statusadmin' => "login"
						);
		 
					$this->session->set_userdata($data_session);
					return true;
				}
	 
			}  
      // login gagal
			return false;
    }

    public function cek_oldpass(){
    	$oldpass = $this->input->post('old_pass');
    	$this->db->where('username','admin');
    	$cek = $this->db->get($this->_table)->row();
    	return password_verify($oldpass, $cek->password);
    }

    public function update(){
    	$new_pass = $this->input->post('new_pass');
			$new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
			$this->db->set('password', $new_pass);
			$this->db->where('username', 'admin');
			return $this->db->update($this->_table);
		} 
}