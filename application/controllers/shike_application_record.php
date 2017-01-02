<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_application_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();

	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		// if(!$user_id){
		// 	header("Location: /login");
		// 	return;
		// }
		$date = date('Y-m-d H:i:s',time());
		$where = "(UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(apply_time))>172800) and apply_status != 3 and apply_status !=4 ";
		$res = $this->db->update("apply",array("apply_status"=>2),$where);

		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$orderwhere = " where user_id=$user_id ";
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			$base_url = "/shike_application_record/?";
		}else{
			$orderwhere = " where apply_status=3 or apply_status=4 and user_id=$user_id";
			$base_url = "/shike_application_record/?order_status=".$order_status;
		}

		$count = $this->db->query("select count(*) as count from apply".$orderwhere)->row_array();
		$count = $count['count'];
		$this->out_data['apply_list'] = $this->db->query("select * from apply".$orderwhere." limit {$start},{$limit}")->result_array();
        $this->out_data['sum_apply_list'] = $this->db->query("select count(*) as count from apply where user_id=$user_id")->row_array();
        $this->out_data['sum_win_apply_list'] = $this->db->query("select count(*) as count from apply where apply_status=3 or apply_status=4 and user_id=$user_id")->row_array();

        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];

		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'shike/application_record';
		$this->load->view('shike_default', $this->out_data);
	}
	public function cancle_apply(){
		$apply_id = $this->input->post('apply_id');
		$res = $this->db->update("apply",array("apply_status"=>'2'),array('apply_id'=>$apply_id));
		echo json_encode($res);
		// echo 1;
	}
	public function test(){
		var_dump($this->session->all_userdata());
	}
}