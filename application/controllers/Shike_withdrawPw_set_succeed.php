<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_withdrawPw_set_succeed extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{


		$this->out_data['con_page'] = 'shike/withdrawPw_set_succeed';
		$this->load->view('shike_default', $this->out_data);
	}
}
