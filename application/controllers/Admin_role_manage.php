<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_role_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// parent::check_shike_login();

	}

	public function index()
	{
		$this->out_data['role'] = $this->db->query("select * from admin")->result_array();
		$this->out_data['con_page'] = 'admin/role_manage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function search(){
		$search = $this->input->get("search");
		$where = " where name like '%{$search}%' ";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from admin".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_role_manage/?search=".$search;
		$this->out_data['role'] = $this->db->query("select * from admin".$where)->result_array();
		//$this->out_data['sellers'] = $this->db->query("select * from seller ".$where." limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/role_manage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function get_role_info(){
		$id = $this->input->post('id');
		$role_info = $this->db->query("select * from admin where id = {$id}")->row_array();
		echo json_encode($role_info);
	}
}