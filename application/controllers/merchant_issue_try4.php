<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_issue_try4 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        // $user_id = $this->session->userdata('user_id');
		$user_id=$this->session->userdata('seller_id');
		$this->out_data['act_id'] = $this->input->get('act_id');
		$activity_sellerid = $this->db->query('select seller_id from activity where act_id='.$this->out_data['act_id'])->row_array();
		if($user_id != $activity_sellerid['seller_id']){
			echo "不可允许的访问";
			return;
		}	
		$this->out_data['seller_id'] = $user_id;
		$this->out_data['activity_list'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		$this->out_data['activity'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		$this->out_data['con_page'] = 'merchant/issue_try4';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function update_fake_activity4(){
		$act_id = $this->input->post('act_id');
		$apply_amount = $this->input->post('apply_amount');
        $is_real = 1;
        $status = 1;
        $time = date('Y-m-d H:i:s',time());
		$info = array("apply_amount" => $apply_amount,
			          "isreal" => $is_real,
			          "status" => $status,
			          "gene_time" => $time);
		$res = $this->db->update("activity",$info,array("act_id"=>$act_id));
		echo json_encode($res);

	}
}
