<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_deposit_withdraw extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

		$user_id = $this->session->userdata('user_id');
        $bankcard = $this->db->query("select * from bankbind where user_id=$user_id and type='1'")->row_array();
        $user = $this->db->query("select * from user where user_id=$user_id")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        $this->out_data['bankcard'] = $bankcard;
        $this->out_data['user'] = $user;
		$this->out_data['con_page'] = 'shike/deposit_withdraw';
		$this->load->view('shike_default', $this->out_data);
	}

	public function post_tixian(){
		$money = $this->input->post('tixian');
		$tixian_pwd = $this->input->post('tixian_pwd');
		$user_id = $this->session->userdata('user_id');
        $user = $this->db->query("select * from user where user_id=$user_id")->row_array();
        if($user['tx_password'] != md5($tixian_pwd)){
        	$res = 0;
        	echo json_encode($res);
        }else{
        	$this->db->update('user',array('money_use' => $user['money_use']-$money),array('user_id' => $user_id));
        }
        $info = array('money' => $money, 
        	          'money_type' => 2,
        	          'processfee' => $money*0.01,
        	          'money_remain' => $sellerinfo['avail_deposit']-$money,
        	          'time' => date('Y-m-d H:i:s',time()),
        	          'flowid' => '123',
        	          'status' => 3,
        	          'seller_id' => $user_id,
        	          'user_type' => 1,
        	          'remarks' => '提现成功');
        $res = $this->db->insert("platformorder",$info);
        echo json_encode($res);

	}
}