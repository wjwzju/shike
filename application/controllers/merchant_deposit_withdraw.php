<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_deposit_withdraw extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
        $bankcard = $this->db->query("select * from bankbind where user_id=$seller_id and type='0'")->row_array();
        $seller = $this->db->query("select * from seller where seller_id=$seller_id")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        $this->out_data['bankcard'] = $bankcard;
        $this->out_data['seller'] = $seller;
		$this->out_data['con_page'] = 'merchant/deposit_withdraw';
		$this->load->view('merchant_default', $this->out_data);
	}

	public function post_tixian(){
		$money = $this->input->post('tixian');
		$tixian_pwd = $this->input->post('tixian_pwd');
		$seller_id = $this->session->userdata('seller_id');
        $seller = $this->db->query("select * from seller where seller_id=$seller_id")->row_array();
        if($seller['withdrawpw'] != md5($tixian_pwd)){
        	$res = 0;
        	echo json_encode($res);
        }else{
        	$this->db->update('seller',array('avail_deposit' => $sellerinfo['avail_deposit']-$money),array('seller_id' => $seller_id));
        }
        $info = array('money' => $money, 
        	          'money_type' => 2,
        	          'processfee' => $money*0.01,
        	          'money_remain' => $sellerinfo['avail_deposit']-$money,
        	          'time' => date('Y-m-d H:i:s',time()),
        	          'flowid' => '123',
        	          'status' => 3,
        	          'seller_id' => $seller_id,
        	          'user_type' => 0,
        	          'remarks' => '提现成功');
        $res = $this->db->insert("platformorder",$info);
        echo json_encode($res);

	}
}
