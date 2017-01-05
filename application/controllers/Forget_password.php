<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget_password extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
		$this->load->view('mall/login_header');
		$this->load->view('forget_password',$this->out_data);
		$this->load->view('mall/footer');
	}

	function check_login()
	{
		$result = array('status' => true, 'msg' => '');
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$password = md5($password);

		$query_merchant = $this->db->query("select * from seller where (user_name='{$name}' and passwd='{$password}') or (tel='{$name}' and passwd='{$password}')");
        $query_shike = $this->db->query("select * from user where user_name='{$name}' and password='{$password}' or phone='{$name}' and password='{$password}'");

		if($query_merchant->num_rows() > 0)
        {
            $query = $query_merchant->row_array();
            $result = array_merge($result, $query);
            $this->session->set_userdata('seller_id', $result['seller_id']);
			$this->session->set_userdata('merchant_login', true);
        }
        elseif($query_shike->num_rows() > 0){
            $query = $query_shike->row_array();
            $result = array_merge($result, $query);
            $this->session->set_userdata('user_id', $result['user_id']);
			$this->session->set_userdata('shike_login', true);
        }
        else{
            $result = array('status' => false, 'msg' => '用户名或密码错误，请重新输入');
        }
		
		echo json_encode($result);
	}

	function logout()
	{
		$this->session->sess_destroy();
		header("Location: /login");
	}

	function reset_pwd()
	{
		$phone = $this->input->post('tel');
		$password = $this->input->post('password');
		$verification_code = $this->input->post('verification_code');
		//判断手机号是否注册
		$res = $this->db->query("select * from user where phone = $phone")->row_array();
		$res2 = $this->db->query("select * from seller where tel = $phone")->row_array();
		if(!count($res) && !count($res2))
		{
			$data = array(
					'success'=>false,
					'code'=>1,//手机未注册
					'data'=>$this->out_data
			);
			echo json_encode($data);
			exit ;
		}
		//验证验证码
		$code_info = $this->db->query("select * from telcode where telephone = '{$phone}' and status = 1 order by time DESC limit 1")->row_array();
		if($verification_code != $code_info['authcode'])
		{
			$data = array(
					'success'=>false,
					'code'=>2,//验证码不正确
					'data'=>$this->out_data
			);
			echo json_encode($data);
			exit ;
		}
		$this->db->query("update telcode set status = 2 where session_id = '{$code_info['session_id']}'");
		$password = md5($password);
		if(count($res))
		{
			//试客
			$this->db->query("update user set password = '$password' where phone = '$phone'");
		}else
		{
			//商家
			$this->db->query("update seller set passwd = '$password' where tel = '$phone'");
		}
		$data = array(
				'success'=>true,
				'code'=>0,
				'data'=>$this->out_data
		);
		echo json_encode($data);
	}

}
