<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_basic_setup extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
		$this->out_data['sellerinfo'] = $this->db->query("select * from seller where seller_id={$seller_id}")->row_array();
		$this->out_data['con_page'] = 'merchant/basic_setup';
		$this->load->view('merchant_default', $this->out_data);
	}
}
