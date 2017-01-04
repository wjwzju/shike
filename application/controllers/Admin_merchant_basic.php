<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_merchant_basic extends MY_Controller {

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
		$count = $this->db->query("select count(*) as count from seller")->row_array();
		$count = $count['count'];
		$base_url = "/admin_merchant_basic/?";
		$this->out_data['sellers'] = $this->db->query("select * from seller limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/merchant_basic';
		$this->load->view('admin_default', $this->out_data);
	}

	public function search(){
		$search = $this->input->get("search");
		$where = " where account like '%{$search}%' or tel like '%{$search}%' ";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from seller".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_merchant_basic/?search=".$search;
		$this->out_data['sellers'] = $this->db->query("select * from seller ".$where." limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/merchant_basic';
		$this->load->view('admin_default', $this->out_data);
	}
	public function get_seller_info(){
		$seller_id = $this->input->post('seller_id');
		$seller_info = $this->db->query("select * from seller where seller_id = {$seller_id}")->row_array();
		echo json_encode($seller_info);
	}
	public function set_seller_info(){
		$seller_id = $this->input->post('seller_id');
		$tel = $this->input->post('tel');
		$qq = $this->input->post('qq');
		$res = $this->db->update("seller",array("tel"=>$tel,"qq"=>$qq),array("seller_id"=>$seller_id));
		echo json_encode($res);
	}
}