<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_login extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
		$this->load->view('shike/login', $this->out_data);
	}

	function check_login()
	{
		$result = array('status' => true, 'msg' => '');
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$password = md5($password);
		$query = $this->db->query("select * from user where user_name='{$name}' and password='{$password}' or phone='{$name}' and password='{$password}'");

		if($query->num_rows() > 0)
        {
            $query = $query->row_array();
            $result = array_merge($result, $query);
        }
        else
        {
            $result = array('status' => false, 'msg' => '用户名或密码错误，请重新输入');
        }
		if($result['status'])
		{
			$this->session->set_userdata('user_id', $result['user_id']);
			$this->session->set_userdata('shike_login', true);
			// $this->session->set_userdata('permission', $result['permission']);
		}
		echo json_encode($result);
	}

	function logout()
	{
		$this->session->sess_destroy();
		header("Location:".base_url()."login");
	}
}