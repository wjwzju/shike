<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_activity_manage extends MY_Controller {

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
		$count = $this->db->query("select count(*) as count from activity")->row_array();
		$count = $count['count'];
		$base_url = "/admin_activity_manage/?";
		$this->out_data['activity'] = $this->db->query("select * from activity limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/activity_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function get_shike_info_by_apply(){
		$act_id = $this->input->post('act_id');
		$shike_info = $this->db->query("select * from apply where act_id=".$act_id)->result_array();
		echo json_encode($shike_info,true);

	}
	public function get_shike_info_by_apply2(){
		$user_id = $this->input->post('user_id');
		$act_id = $this->input->post('act_id');
		if($user_id){
			$shike_info = $this->db->query("select * from apply where user_id=".$user_id." and act_id=".$act_id)->result_array();
		}else{
			$shike_info = $this->db->query("select * from apply where act_id=".$act_id)->result_array();
		}
		//$shike_info = $this->db->query("select * from apply where user_id=".$user_id." and act_id=".$act_id)->row_array();
		echo json_encode($shike_info,true);
	}
	public function search(){
		$search = $this->input->get("search");
		$where = " where act_id like '%{$search}%' ";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from activity".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_activity_manage/?search=".$search;
		$this->out_data['activity'] = $this->db->query("select * from activity ".$where." limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/activity_manage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function get_activity_info(){
		$act_id = $this->input->post('act_id');
		$activity_info = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
		echo json_encode($activity_info);
	}
	public function set_seller_info(){
		$seller_id = $this->input->post('seller_id');
		$tel = $this->input->post('tel');
		$qq = $this->input->post('qq');
		$res = $this->db->update("seller",array("tel"=>$tel,"qq"=>$qq),array("seller_id"=>$seller_id));
		echo json_encode($res);
	}
}