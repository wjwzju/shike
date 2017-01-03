<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_loginPw_modify_succeed extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        // $act_id = $this->input->get('act_id');
        // $this->out_data['act'] = $this->db->query("select * from activity where act_id=$act_id")->row_array();

		$this->out_data['con_page'] = 'shike/loginPw_modify_succeed';
		$this->load->view('shike_default', $this->out_data);
	}
}
