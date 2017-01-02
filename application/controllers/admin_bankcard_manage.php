<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_bankcard_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$this->out_data['shike_cards'] = $this->db->query("select * from bankbind where type=1")->result_array();
		$this->out_data['merchant_cards'] = $this->db->query("select * from bankbind where type=0")->result_array();
		$this->out_data['con_page'] = 'admin/bankcard_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function merchant_search(){
		$search = $this->input->get("search");
		$where = " where user_id like '%{$search}%' and type=0";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from bankbind".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_bankcard_manage/?search=".$search;
		$this->out_data['shike_cards'] = $this->db->query("select * from bankbind where type=1")->result_array();
		$this->out_data['merchant_cards'] = $this->db->query("select * from bankbind ".$where)->result_array();
		//$this->out_data['sellers'] = $this->db->query("select * from seller ".$where." limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/bankcard_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function shike_search(){
		$search = $this->input->get("search");
		$where = " where user_id like '%{$search}%' and type=1";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from bankbind".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_bankcard_manage/?search=".$search;
		$this->out_data['merchant_cards'] = $this->db->query("select * from bankbind where type=0")->result_array();
		$this->out_data['shike_cards'] = $this->db->query("select * from bankbind ".$where)->result_array();
		//$this->out_data['sellers'] = $this->db->query("select * from seller ".$where." limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/bankcard_manage';
		$this->load->view('admin_default', $this->out_data);
	}
}