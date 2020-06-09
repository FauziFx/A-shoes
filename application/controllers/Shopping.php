	<?php
class Shopping extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		$this->load->model('product_model');
		$this->load->model('checkout_model');
		$this->load->model('user_model');
		$this->load->model('order_model');
		$this->load->model('email_model');
	}

	public function index(){
		$about         = $this->about_model;
		$data['about'] = $about->get_about();
		$this->load->view('shopping_cart', $data);
	}

	public function add_cart(){
		$data_product= array('id' => $this->input->post('id'),
											'name'   => $this->input->post('name'),
											'price'  => $this->input->post('price'),
											'size'   => '',
											'image'  => $this->input->post('image'),
											'qty'    =>$this->input->post('qty'),
											'eur_38' => $this->input->post('eur_38'),
											'eur_39' => $this->input->post('eur_39'),
											'eur_40' => $this->input->post('eur_40'),
											'eur_41' => $this->input->post('eur_41'),
											'eur_42' => $this->input->post('eur_42'),
											'eur_43' => $this->input->post('eur_43'),
											'eur_44' => $this->input->post('eur_44')
												);
		$this->cart->insert($data_product);
		$this->session->set_flashdata('addcart', 'Product add to cart !!');
		redirect(base_url());
	}

	public function update_cart(){
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid  = $cart['rowid'];
			$size   = $cart['size'];
			$qty    = $cart['qty'];
			$amount = $price * $cart['qty'];
			$data   = array('rowid' => $rowid,
											'size'   => $size,
											'amount' => $amount,
											'qty'    => $qty);
			$this->cart->update($data);
		}
		redirect('shopping');
	}

	public function delete_cart($id = null){
		if($id == 'all'){
			$this->cart->destroy();
		}else{
			$data = array('rowid' => $id, 'qty' =>0);
			$this->cart->update($data);
		}
		redirect('shopping');
	}

	public function get_province(){
		$checkout = $this->checkout_model;
		$province = $checkout->get_data('province');
		$data     = json_decode($province,TRUE);
		echo json_encode($data['rajaongkir']['results']);
	}

	public function get_city($idprov){
		$checkout = $this->checkout_model;
		$province = $checkout->get_data('city?province='.$idprov);
		$data     = json_decode($province,TRUE);
		echo json_encode($data['rajaongkir']['results']);
	}

	public function get_cost($dest,$weight,$cour){
		$checkout = $this->checkout_model;
		$province = $checkout->get_cost($dest,$weight,$cour);
		$data     = json_decode($province,TRUE);
		echo json_encode($data['rajaongkir']['results'][0]['costs']);
	}


	public function check_out(){
		if(!$this->cart->contents()) redirect(base_url());
		foreach ($this->cart->contents() as $item) {
			if($item['size'] == ''){
				$this->session->set_flashdata("error", "Size is Empty");
				redirect(base_url('shopping'));
			}
		}
		$order = $this->order_model;
		$user  = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($order->rules());

		if($validation->run()){
			$post   = $this->input->post();
			$userid = $this->session->userdata('userid');
			if(isset($post["username"])){
				$validationn = $this->form_validation;
				$validationn->set_rules($user->rules());
				if($validationn->run()){
					$userid = $user->save();
					if($userid === false){
						$this->session->set_flashdata("error", "The Username or email address you have entered is already registered");
						redirect('shopping/check_out');
					}
				}
			}
			$orderid = $order->save($userid);
			$this->session->set_flashdata("order", "complete");
			$this->session->set_flashdata("orderid", $orderid);
			redirect('shopping/complete_order');
		}

		$about         = $this->about_model;
		$data['about'] = $about->get_about();
		$this->load->view('check_out', $data);
	}

	public function complete_order(){
		if($this->session->flashdata('order') != 'complete') redirect(base_url());
		$orderid = $this->session->flashdata('orderid');
		$order = $this->order_model;
		$about = $this->about_model;
		$email = $this->email_model;
		$data['order'] = $order->get_order_byid($orderid);
		$data['detail']= $order->get_detail($orderid);
		$data['about'] = $about->get_about();
		$to = $this->session->userdata('email');
		$subject = "A-Shoes Order Confirmation";
		$message = $this->load->view('email_order', $data, true);

		$email->send($to, $subject, $message);
		$this->load->view('complete_order', $data);
	}

}
