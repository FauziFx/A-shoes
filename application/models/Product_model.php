<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_product = "tbl_product";
    private $_image 	= "tbl_product_image";
    private $_size		= "tbl_size";
    private $_category= "tbl_category";

    public function rules(){
    	return [
				[
					'field'=>'category',
					'label'=>'Category',
					'rules'=>'required'
				],
				[
					'field'=>'product_name',
					'label'=>'Product Name',
					'rules'=>'required'
				],
				[
					'field'=>'price',
					'label'=>'Price',
					'rules'=>'required'
				],
				[
					'field'=>'description',
					'label'=>'Description',
					'rules'=>'required'
				]
			];
    }

    public function get_all($limit=null, $start=null){
      $this->db->join($this->_category, "$this->_category.categoryid = $this->_product.category_id");
      $this->db->join($this->_size, "$this->_size.sizeid = $this->_product.size_id");
      $this->db->join($this->_image, "$this->_image.productimageid = $this->_product.productimage_id");
      if($limit == null && $start == null){
        return $this->db->get($this->_product)->result();
      }else{
        $category = $this->input->post('bycategory');
        $search   = $this->input->post('search');
        if(isset($category)){
          return $this->db->get_where($this->_product, ['category_id'=>$category], $limit, $start)->result();
        }elseif(isset($search)){
          $this->db->like('product_name', $search, 'both');
          return $this->db->get($this->_product, $limit, $start)->result();
        }else{
          return $this->db->get($this->_product, $limit, $start)->result();
        }
      }
    }

    public function get_by_id($id){
      $this->db->join($this->_category, "$this->_category.categoryid = $this->_product.category_id");
      $this->db->join($this->_size, "$this->_size.sizeid = $this->_product.size_id");
      $this->db->join($this->_image, "$this->_image.productimageid = $this->_product.productimage_id");
      $this->db->where('productid', $id);
      return $this->db->get($this->_product)->row();
    }

    public function get_random(){
      $this->db->join($this->_category, "$this->_category.categoryid = $this->_product.category_id");
      $this->db->join($this->_size, "$this->_size.sizeid = $this->_product.size_id");
      $this->db->join($this->_image, "$this->_image.productimageid = $this->_product.productimage_id");
      $this->db->order_by('rand()');
      $this->db->limit(4);
      return $this->db->get($this->_product)->result();
    }

    public function save_product(){
      if(count($_FILES['files']['name']) != 1){
        if (is_array($filename=$this->uploadImage())) {
          $productimage_id = $this->save_images($filename);
        }else{
          return $this->session->set_flashdata('error', $filename);
        }
      }
			$post      = $this->input->post();
      $size_id  = $this->save_size();
      $data = array(
              'productid'      => uniqid(),
              'product_name'   => $post["product_name"],
              'price'          => $post["price"],
              'size_id'        => $size_id,
              'category_id'    => $post["category"],
              'productimage_id'=> $productimage_id,
              'description'    => $post["description"]
      );
      $this->db->set($data);
      return $this->db->insert($this->_product);
		}

    private function save_size(){
      $post = $this->input->post();
      $data = array(
            'eur_38' => $post["eur_38"],
            'eur_39' => $post["eur_39"],
            'eur_40' => $post["eur_40"],
            'eur_41' => $post["eur_41"],
            'eur_42' => $post["eur_42"],
            'eur_43' => $post["eur_43"],
            'eur_44' => $post["eur_44"]
      );
      $this->db->set($data);
      $this->db->insert($this->_size);
      return $this->db->insert_id();
    }


    private function save_images($filename){

      $data = array(
            'image1'=> $image1 = (isset($filename[0])) ? $filename[0] : null,
            'image2'=> $image2 = (isset($filename[1])) ? $filename[1] : null,
            'image3'=> $image3 = (isset($filename[2])) ? $filename[2] : null,
            'image4'=> $image4 = (isset($filename[3])) ? $filename[3] : null
      );
      $this->db->set($data);
      $this->db->insert($this->_image);
      return $this->db->insert_id();
    }

    private function uploadImage() { 

      $count = count($_FILES['files']['name']);
 
      for($i=0;$i<$count;$i++){
 
        if(!empty($_FILES['files']['name'][$i])){
 
          $_FILES['file']['name']     = $_FILES['files']['name'][$i];
          $_FILES['file']['type']     = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error']    = $_FILES['files']['error'][$i];
          $_FILES['file']['size']     = $_FILES['files']['size'][$i];

          $config['upload_path']   = './upload/product/'; 
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['max_size']      = '1000'; // max_size in kb
          $config['encrypt_name']  = TRUE;
          $config['file_name']     = $_FILES['files']['name'][$i];
 
          $this->load->library('upload',$config); 
 
          if(!$this->upload->do_upload('file')){
            return $this->upload->display_errors();
          }else{
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            $data[] = $filename;
          }
        }
 
      }
      return $data;
   }

    public function update_product(){
      if(count($_FILES['files']['name']) != 1){
        if (is_array($filename=$this->uploadImage())) {
          $productimageid = $this->input->post('productimageid');
          $this->update_images($filename, $productimageid);
        }else{
          return $this->session->set_flashdata('error', $filename);
        }
      }
      $post      = $this->input->post();
      $sizeid    = $post['sizeid'];
      $this->update_size($sizeid);

      $productid = $post['productid'];
      $data = array(
              'product_name' => $post["product_name"],
              'price'        => $post["price"],
              'category_id'  => $post["category"],
              'description'  => $post["description"]
      );  
      $this->db->set($data);
      $this->db->where('productid', $productid);
      return $this->db->update($this->_product);
    }

    private function update_size($id){
      $post = $this->input->post();
      $data = array(
            'eur_38' => $post["eur_38"],
            'eur_39' => $post["eur_39"],
            'eur_40' => $post["eur_40"],
            'eur_41' => $post["eur_41"],
            'eur_42' => $post["eur_42"],
            'eur_43' => $post["eur_43"],
            'eur_44' => $post["eur_44"]
      );
      $this->db->set($data);
      $this->db->where('sizeid', $id);
      return $this->db->update($this->_size);
    }

    private function update_images($filename, $id){
      $this->delete_images($id);

      $data = array(
            'image1'=> $image1 = (isset($filename[0])) ? $filename[0] : null,
            'image2'=> $image2 = (isset($filename[1])) ? $filename[1] : null,
            'image3'=> $image3 = (isset($filename[2])) ? $filename[2] : null,
            'image4'=> $image4 = (isset($filename[3])) ? $filename[3] : null
      );
      $this->db->set($data);
      $this->db->where('productimageid', $id);
      return $this->db->update($this->_image);
    }

    private function delete_images($id){
      $this->db->where('productimageid', $id);
      $img = $this->db->get($this->_image)->row();
      if($img){
        if($img->image1 != null) unlink(FCPATH . 'upload/product/' . $img->image1);
        if($img->image2 != null) unlink(FCPATH . 'upload/product/' . $img->image2);
        if($img->image3 != null) unlink(FCPATH . 'upload/product/' . $img->image3);
        if($img->image4 != null) unlink(FCPATH . 'upload/product/' . $img->image4);

        return true;
      }
    }

    public function delete(){
      $sizeid  =$this->input->post('sizeid');
      $imageid =$this->input->post('productimageid');
      $this->delete_images($imageid);
      if($this->db->delete($this->_image, ['productimageid'=>$imageid])){
        return $this->db->delete($this->_size, ['sizeid'=>$sizeid]);
      }
    }

}