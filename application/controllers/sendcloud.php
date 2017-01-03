<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-Type: text/html; charset=GBK");
//require_once 'log.php';
class Sendcloud extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		//$this->load->library('user_agent');
	}
	
	public function index()
	{	
		//$tel = $this->input->get('tel');
		$tel = $this->input->post('tel');
		$code = rand(1000,9999);
		$url="http://utf8.sms.webchinese.cn/?Uid=91shike&Key=6dbcefa96f64859e24cb&smsMob=$tel&smsText=验证码：$code";
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$res = curl_exec($ch);
		curl_close($ch);
		$status = ($res == 1)?1:$res;
		$send_ip = $this->input->ip_address();
		$this->session->set_userdata(array("telcode"=>$code));
		$time = date('Y-m-d H:i:s',time());
        $info = array('telephone' => $tel, 
        	          'authcode' => $code,
        	          'time' => $time,
				      'status'=>$status,
				      'send_ip'=>$send_ip);
		$this->db->insert('telcode', $info);
		echo $res;
	}

/*-----------------------------------------以下为私有方法---------------------------------------------------*/

}