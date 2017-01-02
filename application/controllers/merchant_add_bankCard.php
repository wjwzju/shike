<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_add_bankCard extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        // $act_id = $this->input->get('act_id');
        // $this->out_data['act'] = $this->db->query("select * from activity where act_id=$act_id")->row_array();

		$this->out_data['con_page'] = 'merchant/add_bankCard';
		$this->load->view('merchant_default', $this->out_data);
	}
	public function post_add_bankcard()
	{
		$seller_id = $this->session->userdata('seller_id');;
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$banktype = $this->input->post('banktype');
		$branchbank = $this->input->post('branchbank');
		$banknum = $this->input->post('banknum');

		$info = array('user_id' => $seller_id,
			          'name' => $name,
			          'phone' => $phone,
			          'banktype' => $banktype,
			          'branchbank' => $branchbank,
			          'banknum' => $banknum,
			          'type' => "0"
			          'time' => date('Y-m-d H:i:s',time()));
		$this->db->insert('bankbind', $info);
	}
}
