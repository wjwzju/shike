<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_activity_details extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{
		$seller_id = $this->session->userdata('seller_id');
		$seller_info=$this->db->query("select * from seller where seller_id={$seller_id}")->row_array();
        $act_id = $this->input->get('act_id');
        $win_shikes = $this->db->query("select shikename from sorder where act_id={$act_id}")->result_array();
        $this->out_data['act'] = $this->db->query("select * from activity where act_id=$act_id")->row_array();
        $this->out_data['seller_info'] = $seller_info;
		$this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        $this->out_data['win_shikes'] = $win_shikes;
		$this->out_data['con_page'] = 'merchant/activity_manage_details';
		$this->load->view('merchant_default', $this->out_data);
	}
}
