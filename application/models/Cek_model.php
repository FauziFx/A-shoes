<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cek_model extends CI_Model
{

	public function cek()	{
		$this->db->query("
				UPDATE tbl_order
				SET status = 4
				WHERE SUBSTRING(TIMEDIFF(CURRENT_TIMESTAMP,order_date),1,2) >= 24 
				AND payment_status='0' 
				AND status='1' 
		");
	}
}