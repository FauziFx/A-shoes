<?php

class User_model extends CI_Model
{
    private $_table = "tbl_users";

    public function rules(){
    	return [
				[
					'field'=>'username',
					'label'=>'Username',
					'rules'=>'required|trim|min_length[5]'
				],
				[
					'field'=>'name',
					'label'=>'Full Name',
					'rules'=>'required|min_length[5]'
				],
				[
					'field'=>'email',
					'label'=>'Email',
					'rules'=>'required|valid_email|trim'
				],
				[
					'field'=>'nohp',
					'label'=>'No Hp',
					'rules'=>'required|max_length[13]|trim'
				],
				[
					'field'=>'password',
					'label'=>'New Password',
					'rules'=>'required|min_length[8]|trim'
				],
				[
					'field'=>'repassword',
					'label'=>'Retype New Password',
					'rules'=>'required|matches[password]|min_length[8]|trim'
				]
			];
    }

    public function rules_update(){
    	return [
				[
					'field'=>'name',
					'label'=>'Full Name',
					'rules'=>'required|min_length[5]'
				],
				[
					'field'=>'email',
					'label'=>'Email',
					'rules'=>'required|valid_email|trim'
				],
				[
					'field'=>'nohp',
					'label'=>'No Hp',
					'rules'=>'required|max_length[13]|trim'
				]
			];
    }

    public function rules_password(){
    	return [
				[
					'field'=>'oldpassword',
					'label'=>'Old Password',
					'rules'=>'required|min_length[8]|trim'
				],
				[
					'field'=>'newpassword',
					'label'=>'New Password',
					'rules'=>'required|min_length[8]|trim'
				],
				[
					'field'=>'confirmpassword',
					'label'=>'Confirm New Password',
					'rules'=>'required|matches[newpassword]|min_length[8]|trim'
				]
			];
    }

    public function get_all(){
    	return $this->db->get($this->_table)->result();
    }

    public function get_by_id($id){
    	return $this->db->get_where($this->_table, ['userid'=>$id])->row();
    }

    public function save(){
			$post     = $this->input->post();
			$username = $post["username"];
			$email   	= $post["email"];
			$uuid     = uniqid();
			$data = array(
					'userid'   => $uuid,
					'username' => $post["username"],
					'name'     => $post["name"],
					'email'    => $post["email"],
					'no_hp'    => $post["nohp"],
					'password' => password_hash($post["password"], PASSWORD_DEFAULT)
			);
			$this->db->where('username', $username);
			$this->db->or_where('email', $email);
			$user = $this->db->get($this->_table)->row();
			if($user){
				return false;
			}else{
				$this->db->set($data);
				if($this->db->insert($this->_table)){
					$data_session = array(
						'userid'     => $uuid,
						'username'   => $post["username"],
						'name'       => $post["name"],
						'email'      => $post["email"],
						'no_hp'      => $post["nohp"],
						'statususer' => 'login'
						);
		 
					$this->session->set_userdata($data_session);
					return $uuid;
				}
			}
    }

    public function update($userid=null){
			$post   = $this->input->post();
			if($userid == null){
				$userid = $this->session->userdata('userid');
			}
			$data = array(
							'name'  =>$post['name'],
							'email' =>$post['email'],
							'no_hp' =>$post['nohp']
			);
			$this->db->set($data);
			$this->db->where('userid', $userid);
			return $this->db->update($this->_table);
		}

    public function delete($id){
			return $this->db->delete($this->_table, ['userid'=>$id]);
		}

    public function doLogin(){
    	$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->db->where('username', $username);
			$this->db->or_where('email', $username);
			$user = $this->db->get($this->_table)->row();
			if($user){
	 			$isPasswordTrue = password_verify($password, $user->password);
	 			if($isPasswordTrue){
					$data_session = array(
						'userid'     => $user->userid,
						'username'   => $user->username,
						'name'       => $user->name,
						'email'      => $user->email,
						'no_hp'      => $user->no_hp,
						'statususer' => 'login'
						);
		 
					$this->session->set_userdata($data_session);
					return true;
				}
	 
			}  
      // login gagal
			return false;
    }

    public function cek_oldpass(){
			$oldpass = $this->input->post('oldpassword');
			$userid  = $this->session->userdata('userid');
    	$this->db->where('userid',$userid);
    	$cek = $this->db->get($this->_table)->row();
    	return password_verify($oldpass, $cek->password);
    }

    public function update_password(){
			$new_pass = $this->input->post('newpassword');
			$new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
			$userid   = $this->session->userdata('userid');
			$this->db->set('password', $new_pass);
			$this->db->where('userid', $userid);
			return $this->db->update($this->_table);
		} 

}