<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_member_recharge extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
        $date = date('Y-m-d h:i:s',time());
        $user_info = $this->db->query("select * from user where user_id ={$user_id}")->row_array();
        if($user_info["level"] == 1){
        	$this->out_data['one_year_end'] = date('Y-m-d',strtotime("+1year", time()));
        	$this->out_data['two_year_end'] = date('Y-m-d',strtotime("+2year", time()));
        	$this->out_data['three_year_end'] = date('Y-m-d',strtotime("+3year", time()));
        }else{
        	$this->out_data['one_year_end'] = date('Y-m-d',strtotime("+1year", strtotime($user_info["vip_endtime"])));
        	$this->out_data['two_year_end'] = date('Y-m-d',strtotime("+2year", strtotime($user_info["vip_endtime"])));
        	$this->out_data['three_year_end'] = date('Y-m-d',strtotime("+3year", strtotime($user_info["vip_endtime"])));
        }
		$this->out_data['con_page'] = 'shike/member_recharge';
		$this->load->view('shike_default', $this->out_data);
	}

	public function pay_recharge(){
		$recharge_year = $this->input->post('recharge_year');
		$user_id = $this->session->userdata('user_id');
		$user_info = $this->db->query("select * from user where user_id ={$user_id}")->row_array();
		if($user_info["level"] == 1){
			if($recharge_year == 1){
			    $end_time = date('Y-m-d H:i:s',strtotime("+1year", time()));
			    $open_duration = "一年";
			    $money = 4000;
		    }elseif ($recharge_year == 2) {
		    	$end_time = date('Y-m-d H:i:s',strtotime("+2year", time()));
		    	$open_duration = "二年";
		    	$money = 7200;
		    }else{
                $end_time = date('Y-m-d H:i:s',strtotime("+3year", time()));
                $open_duration = "三年";
                $money = 9600;
		    }
		    $info = array('level' => 2, 
		    	          'vip_endtime' => $end_time);
		    $this->db->update("user",$info,array("user_id"=>$user_id));
		    $info = array('seller_id' => $user_id, 
		    	          'open_duration' => $open_duration,
		    	          'end_time' => $end_time,
		    	          'money' => $money,
		    	          'charge_type' => 1,
		    	          'status' => 1,
		    	          'charge_time' => date('Y-m-d H:i:s',time()),
		    	          'user_type' => 1);
		    $res = $this->db->insert("seller_charge_order",$info);
		}else{
			if($recharge_year == 1){
			    $end_time = date('Y-m-d H:i:s',strtotime("+1year", strtotime($user_info["vip_endtime"])));
			    $open_duration = "一年";
			    $money = 4000;
		    }elseif ($recharge_year == 2) {
		    	$end_time = date('Y-m-d H:i:s',strtotime("+2year", strtotime($user_info["vip_endtime"])));
		    	$open_duration = "二年";
		    	$money = 7200;
		    }else{
                $end_time = date('Y-m-d H:i:s',strtotime("+3year", strtotime($user_info["vip_endtime"])));
                $open_duration = "三年";
                $money = 9600;
		    }
		    $info = array('level' => 2, 
		    	          'vip_endtime' => $end_time);
		    $this->db->update("user",$info,array("user_id"=>$user_id));
		    $info = array('seller_id' => $user_id, 
		    	          'open_duration' => $open_duration,
		    	          'end_time' => $end_time,
		    	          'money' => $money,
		    	          'charge_type' => 2,
		    	          'status' => 1,
		    	          'charge_time' => date('Y-m-d H:i:s',time()),
		    	          'user_type' => 1);
		    $res = $this->db->insert("seller_charge_order",$info);
		}
		echo json_encode($res);
	}


}