<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_try_winningManage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from sorder")->row_array();
		$count = $count['count'];
		$base_url = "/admin_try_winningManage/?";
		$this->out_data['orders'] = $this->db->query("select * from sorder limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/try_winningManage';
		$this->load->view('admin_default', $this->out_data);
	}
}