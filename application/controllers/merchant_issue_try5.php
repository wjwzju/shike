<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_issue_try5 extends MY_Controller {

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
		$this->out_data['sellerinfo'] = $this->db->query("select * from seller where seller_id ={$user_id}")->row_array();
		$this->out_data['activity_list'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		//var_dump($this->out_data['activity_list']);die();
		$this->out_data['activity'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		//var_dump($this->out_data);die();
		$this->out_data['con_page'] = 'merchant/issue_try5';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function check_pay(){
		$pwd = $this->input->post('pwd');
		$act_id = $this->input->post('act_id');
		$seller_id=$this->session->userdata('seller_id');
		$seller_info=$this->db->query("select * from seller where seller_id={$seller_id}")->row_array();
		if ($seller_info["paypw"] != md5($pwd)){
            $res = 0;
            echo json_encode($res);
		}else{
		    $avail = $this->input->post('avail');
		    $need_pay = $this->input->post('need_pay');
		    $freeze_deposit = $seller_info["freeze_deposit"];
            $info = array('avail_deposit' => $avail-$need_pay,
            	          'freeze_deposit' => $freeze_deposit+$need_pay);
		    $this->db->update("seller",$info,array("seller_id"=>$seller_id));
            $this->db->update("activity",array('status' => 2),array("act_id"=>$act_id));
		    $res = 1;
		    echo json_encode($res);
	    }
	}

	public function cancel_act(){
		$act_id = $this->input->post('act_id');
		$res = $this->db->update("activity",array('status' => 5),array("act_id"=>$act_id));
		echo json_encode($res);
	}
}
