<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_funds_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();

	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$orderwhere = '';
		$money_type = $this->input->get('money_type');
		$this->out_data['money_type'] = $money_type;
		if(!$money_type){
			$orderwhere .= " where seller_id=$user_id and user_type='1'";
		}else{
			$orderwhere .= " where seller_id=$user_id and user_type='1' and money_type=".$money_type;
		}
		$this->out_data['money_list'] = $this->db->query("select * from platformorder".$orderwhere." order by time desc")->result_array();
		$this->out_data['con_page'] = 'shike/funds_record';
		$this->load->view('shike_default', $this->out_data);
	}
}