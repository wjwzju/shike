<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_get_order extends MY_Controller {

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
		$this->out_data['con_page'] = 'shike/get_order';
		//var_dump($this->out_data);die();
		$this->load->view('shike_default', $this->out_data);
	}
}
