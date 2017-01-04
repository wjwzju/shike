<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_message_center extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$base_url = "/shike_message_center/?";
		$count = $this->db->query("select count(*) as count from message where user_id=$user_id and user_type='1'")->row_array();
		$count = $count['count'];
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
        $this->out_data['messages'] = $this->db->query("select * from message where user_id=$user_id and user_type='1' order by message_time desc limit {$start},{$limit}")->result_array();    
		$this->out_data['con_page'] = 'shike/message_center';
		$this->load->view('shike_default', $this->out_data);
	}
}