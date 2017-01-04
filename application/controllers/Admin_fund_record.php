<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_fund_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// parent::check_permission('admin');
	}

	public function index()
	{

		$this->out_data['shike_orders'] = $this->db->query("select * from platformorder where user_type=1")->result_array();
		$this->out_data['merchant_orders'] = $this->db->query("select * from platformorder where user_type=0")->result_array();
		$this->out_data['con_page'] = 'admin/fund_record';
		$this->load->view('admin_default', $this->out_data);
	}
}