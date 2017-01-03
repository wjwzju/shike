<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once 'log.php';
class Shike_userapi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
        $this->load->library('session');
		//$this->load->library('user_agent');
	}
	
	public function index()
	{
		
	}
	public function get_session(){
		$user_id = $this->session->userdata('user_id');
		$authcode = $this->input->post("authcode");
		$passwd = $this->input->post("passwd");
		$telcode = $this->session->userdata("telcode");
		$this->session->set_userdata(array("telcode",""));
		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}else{
			$info = array("password"=>md5($passwd));
			$ress = $this->db->update("user",$info,array("user_id"=>$user_id));
			$msg = "成功";
			$res = 1;
		}
		$result = array("msg"=>$msg,"res"=>$res);
		echo json_encode($result);

	}

	public function check_telcode(){
		$user_id = $this->session->userdata('user_id');
		$authcode = $this->input->post("authcode");
		$telcode = $this->session->userdata("telcode");
		$this->session->set_userdata(array("telcode",""));
		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}else{
			$this->session->set_userdata(array("settel_permission"=>$user_id));
			$msg = "成功";
			$res = 1;
		}
		$result = array("msg"=>$msg,"res"=>$res);
		echo json_encode($result);

	}

	public function check_telcode2(){
		$user_id = $this->session->userdata('user_id');
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
			$info = array("phone"=>$phone);
			$ress = $this->db->update("user",$info,array("user_id"=>$user_id));
			$msg = "成功";
			$res = 1;
		}
		$this->session->set_userdata(array("settel_permission"=>0));
		$result = array("msg"=>$msg,"res"=>$res);
		echo json_encode($result);

	}

	public function bound_taobao(){
		$user_id = $this->session->userdata('user_id');
		$taobao = $this->input->post("taobao");
		$info = array("taobao_id"=>$taobao,
			          "taobao_status"=>1);
		$ress = $this->db->update("user",$info,array("user_id"=>$user_id));
		echo json_encode($ress);
	}

	public function set_withdrawPw(){
		$user_id = $this->session->userdata('user_id');
		$passwd = $this->input->post("passwd");
		$info = array("tx_password"=>md5($passwd));
		$ress = $this->db->update("user",$info,array("user_id"=>$user_id));
		echo json_encode($ress);
	}

	public function set_qq(){
		$user_id = $this->session->userdata('user_id');
		$qq = $this->input->post("qq");
		$info = array("user_qq"=>$qq);
		$ress = $this->db->update("user",$info,array("user_id"=>$user_id));
		echo json_encode($ress);
	}

	public function get_sideinfo(){
		$user_id = $this->session->userdata('user_id');
		$win_count = $this->db->query("select count(*) as count from sorder where user_id={$user_id}")->row_array();
		$buy_count = $this->db->query("select count(*) as count from discount where user_id={$user_id}")->row_array();
		$mess_count = $this->db->query("select count(*) as count from message where user_id={$user_id} and user_type='1' and status='0'")->row_array();
		$result = array('win_count' => $win_count['count'], 
			            'buy_count' => $buy_count['count'],
			            'mess_count' => $mess_count['count']);
		echo json_encode($result);

	}
/*-----------------------------------------以下为私有方法---------------------------------------------------*/

}