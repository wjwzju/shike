<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_issue_try extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
		$this->out_data['seller_id'] = $seller_id;
		$this->out_data['shoplist'] = $this->db->query("select * from shop where seller_id=".$seller_id)->result_array();
		//var_dump($this->out_data);die();
		$this->out_data['con_page'] = 'merchant/issue_try';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function insert_fake_activity(){
		$seller_id = $this->input->post('seller_id');
		$shop_name = $this->input->post('shop_name');
		$platform_id = $this->input->post('platform_id');
		$info = array("seller_id" => $seller_id,"shopname"=>$shop_name,"platformid"=>$platform_id,"isreal"=>0);
		$this->db->insert("activity",$info);
		$res = $this->db->insert_id('act_id');
		echo json_encode($res);

	}
	public function update_confirm_ship(){
		$wuliu = $this->input->post('wuliu');
		$yundan = $this->input->post('yundan');
		$order_id = $this->input->post('order_id');
		$info = array("wuliu"=>$wuliu,"yundan"=>$yundan,'status'=>2);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}

	public function update_shenhe(){
		$order_id = $this->input->post('order_id');
		$info = array('status'=>3);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}
}
