<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_member_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
        $this->out_data['recharges'] = $this->db->query("select * from seller_charge_order where seller_id=$seller_id")->result_array();
        $this->out_data['seller'] = $this->db->query("select * from seller where seller_id=$seller_id")->row_array();

		$this->out_data['con_page'] = 'merchant/member_manage';
		$this->load->view('merchant_default', $this->out_data);
	}
}
