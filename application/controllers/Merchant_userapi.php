<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once 'log.php';
class Merchant_userapi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		//$this->load->library('user_agent');
	}
	
	public function index()
	{
		
	}
	public function get_session(){
		$seller_id = $this->session->userdata('seller_id');
		$authcode = $this->input->post("authcode");
		$passwd = $this->input->post("passwd");
		$telcode = $this->session->userdata("telcode");
		$this->session->set_userdata(array("telcode",""));
		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}else{
			$info = array("passwd"=>md5($passwd));
			$ress = $this->db->update("seller",$info,array("seller_id"=>$seller_id));
			$msg = "成功";
			$res = 1;
		}
		$result = array("msg"=>$msg,"res"=>$res);
		echo json_encode($result);

	}

	public function check_telcode(){
		$authcode = $this->input->post("authcode");
		$telcode = $this->session->userdata("telcode");
		$this->session->set_userdata(array("telcode",""));
		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}else{
			$this->session->set_userdata(array("settel_permission"=>1));
			$msg = "成功";
			$res = 1;
		}
		$result = array("msg"=>$msg,"res"=>$res);
		echo json_encode($result);

	}

	public function check_telcode2(){
		$seller_id = $this->session->userdata('seller_id');
		$authcode = $this->input->post("authcode");
		$telcode = $this->session->userdata("telcode");
		$this->session->set_userdata(array("telcode",""));
		$phone = $this->input->post("phone");

		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}elseif(!$this->session->userdata("settel_permission")){
			$msg = "未经允许的访问";
			$res = 0;
		}else{
			$info = array("tel"=>$phone);
			$ress = $this->db->update("seller",$info,array("seller_id"=>$seller_id));
			$msg = "成功";
			$res = 1;
		}
		$this->session->set_userdata(array("settel_permission"=>0));
		$result = array("msg"=>$msg,"res"=>$res);
		//$result = array('authcode'=>$authcode,'telcode'=>$telcode,'phone'=>$phone);
		echo json_encode($result);

	}

	public function set_payPw(){
		$seller_id = $this->session->userdata('seller_id');
		$passwd = $this->input->post("passwd");
		$info = array("paypw"=>md5($passwd));
		$ress = $this->db->update("seller",$info,array("seller_id"=>$seller_id));
		echo json_encode($ress);
	}

	public function set_withdrawPw(){
		$seller_id = $this->session->userdata('seller_id');
		$passwd = $this->input->post("passwd");
		$info = array("withdrawpw"=>md5($passwd));
		$ress = $this->db->update("seller",$info,array("seller_id"=>$seller_id));
		echo json_encode($ress);
	}

	public function set_qq(){
		$seller_id = $this->session->userdata('seller_id');
		$qq = $this->input->post("qq");
		$info = array("qq"=>$qq);
		$ress = $this->db->update("seller",$info,array("seller_id"=>$seller_id));
		echo json_encode($ress);
	}

	public function get_sideinfo(){
		$seller_id = $this->session->userdata('seller_id');
		$act_count = $this->db->query("select count(*) as count from activity where seller_id={$seller_id} and isreal=1")->row_array();
		$order_count = $this->db->query("select count(*) as count from sorder where seller_id={$seller_id}")->row_array();
		$mess_count = $this->db->query("select count(*) as count from message where user_id={$seller_id} and user_type='0' and status='0'")->row_array();
		$result = array('act_count' => $act_count['count'], 
			            'order_count' => $order_count['count'],
			            'mess_count' => $mess_count['count']);
		echo json_encode($result);

	}
/*-----------------------------------------以下为私有方法---------------------------------------------------*/

}