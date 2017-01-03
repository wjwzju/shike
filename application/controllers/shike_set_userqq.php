<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_set_userqq extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

        // $act_id = $this->input->get('act_id');
        // $this->out_data['act'] = $this->db->query("select * from activity where act_id=$act_id")->row_array();

		$this->out_data['con_page'] = 'shike/set_userqq';
		$this->load->view('shike_default', $this->out_data);
	}
}
