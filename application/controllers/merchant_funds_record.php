<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_funds_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
		$orderwhere = '';
		$money_type = $this->input->get('money_type');
		$this->out_data['money_type'] = $money_type;
		if(!$money_type){
			$orderwhere .= " where seller_id=$seller_id and user_type='0'";
		}else{
			$orderwhere .= " where seller_id=$seller_id and user_type='0' and money_type=".$money_type;
		}
		$this->out_data['money_list'] = $this->db->query("select * from platformorder".$orderwhere." order by time desc")->result_array();

		$this->out_data['con_page'] = 'merchant/funds_record';
		$this->load->view('merchant_default', $this->out_data);
	}
}
