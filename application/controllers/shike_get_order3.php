<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_get_order3 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

        $user_id = $this->session->userdata('user_id');
		$order_id = $this->input->get("order_id");
		$orderinfo = $this->db->query("select * from sorder where order_id=".$order_id)->row_array();
		$userinfo = $this->db->query("select * from user where user_id=".$user_id)->row_array();
		$this->out_data['orderinfo'] = $orderinfo;
		$this->out_data['userinfo'] = $userinfo;
		$this->out_data['user_id'] = $user_id;
		//$this->out_data['shoplist'] = $this->db->query("select * from shop where seller_id=".$user_id)->result_array();
		//var_dump($this->out_data);die();
		$this->out_data['con_page'] = 'shike/get_order3';
		//var_dump($this->out_data);die();
		$this->load->view('shike_default', $this->out_data);
	}

	public function submit_order3(){
		$product_url1 = $this->input->post('product_url1');
		$product_url2 = $this->input->post('product_url2');
		$product_url3 = $this->input->post('product_url3');
		$product_url4 = $this->input->post('product_url4');
		$order_id = $this->input->post('order_id');
		$info = array("product_url1" => $product_url1,"product_url2" => $product_url2,"product_url3" => $product_url3,"product_url4" => $product_url4);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
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
