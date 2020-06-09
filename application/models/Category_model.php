<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model
{
	private $_table = 'tbl_category';
	public $category;

	public function rules()	{
		return [
			['field'=>'category',
			'label'=>'Category',
			'rules'=>'required']
		];
	}

	public function get_all(){
		return $this->db->get($this->_table)->result();
	}

	public function get_by_id($id){
		return $this->db->get_where($this->_table, ['categoryid'=>$id])->row();
	}

	public function save(){
		$post = $this->input->post();
		$this->category = ucfirst($post['category']);
		return $this->db->insert($this->_table, $this);
	}

	public function update(){
			$post = $this->input->post();
			$this->category = $post['category'];
			return $this->db->update($this->_table, $this, ['categoryid'=>$post['id']]);
	}

	public function delete($id){
		return $this->db->delete($this->_table, ['categoryid'=>$id]);
	}
}