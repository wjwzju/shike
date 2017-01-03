<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{
        // $user_id = $this->session->userdata('user_id')

        // $users = $this->db->query("select * from user where user_id='1'")->row_array();
        // echo $users['user_id'];

  //       $this->out_data['user'] = $this->db->query("select * from user where user_id='1'")->row_array();
		$this->out_data['con_page'] = 'merchant';
		$this->load->view('merchant_default', $this->out_data);
	}

}
