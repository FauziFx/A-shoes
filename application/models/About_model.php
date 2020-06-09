<?php defined('BASEPATH') OR exit('No direct script access allowed');
class About_model extends CI_Model
{
	private $_about = 'tbl_about';
	private $_gallery = 'tbl_gallery';

	public $name;
	public $description;
	public $address;
	public $email;
	public $instagram;
	public $facebook;

	public function rules()	{
		return [
			[
				'field'=>'name',
				'label'=>'Shop Name',
				'rules'=>'required'
			],
			[
				'field'=>'description',
				'label'=>'Description',
				'rules'=>'required'
			],
			[
				'field'=>'address',
				'label'=>'Address',
				'rules'=>'required'
			],
			[
				'field'=>'email',
				'label'=>'Email',
				'rules'=>'required'
			],
			[
				'field'=>'instagram',
				'label'=>'Instagram',
				'rules'=>'required'
			],
			[
				'field'=>'facebook',
				'label'=>'Facebook',
				'rules'=>'required'
			]
		];
	}

	public function get_about(){
		return $this->db->get($this->_about)->row();
	}

	public function get_gallery(){
		return $this->db->get($this->_gallery)->result();
	}

	public function get_gallery_byid($id){
		return $this->db->get_where($this->_gallery, ['galleryid'=>$id])->row();
	}

	public function save_gallery(){
		$post = $this->input->post();
		$data = array('image' => $this->uploadImage());
		return $this->db->insert($this->_gallery, $data);
	}

	public function update(){
		$post = $this->input->post();
		$this->name 			 = $post['name'];
		$this->description = $post['description'];
		$this->address     = $post['address'];
		$this->email       = $post['email'];
		$this->instagram   = $post['instagram'];
		$this->facebook    = $post['facebook'];
		return $this->db->update($this->_about, $this, ['aboutid'=>1]);
	}

	public function delete($id){
		$this->deleteImage($id);
		return $this->db->delete($this->_gallery, ['galleryid'=>$id]);
	}	

	private function uploadImage(){
	    $config['upload_path']          = './upload/gallery/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['overwrite']						= true;
	    $config['max_size']             = 1024; // 1MB
	    $config['encrypt_name']					= true;

	    $this->load->library('upload', $config);

	    $this->upload->do_upload('image');
      return $this->upload->data("file_name");
	}

	private function deleteImage($id){
		$gallery = $this->get_gallery_byid($id);
		if($gallery->image != null) unlink(FCPATH . 'upload/gallery/' . $gallery->image);
	}

	// public function delete($id){
	// 	return $this->db->delete($this->_table, ['categoryid'=>$id]);
	// }
}