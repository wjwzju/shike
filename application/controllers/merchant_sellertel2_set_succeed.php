<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_sellertel2_set_succeed extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        // $act_id = $this->input->get('act_id');
        // $this->out_data['act'] = $this->db->query("select * from activity where act_id=$act_id")->row_array();
		$this->session->set_userdata(array("telcode"=>0));
		$this->session->set_userdata(array("settel_permission"=>0));
		$this->out_data['con_page'] = 'merchant/sellertel2_set_succeed';
		$this->load->view('merchant_default', $this->out_data);
	}
}
