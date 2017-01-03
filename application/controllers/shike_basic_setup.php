<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_basic_setup extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

        $user_id = $this->session->userdata('user_id');
		$this->out_data['userinfo'] = $this->db->query("select * from user where user_id={$user_id}")->row_array();
		$this->out_data['con_page'] = 'shike/basic_setup';
		$this->load->view('shike_default', $this->out_data);
	}
}
