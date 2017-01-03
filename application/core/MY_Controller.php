<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * this is the base controller
	 * all the controller must extends base controller explect login
	 */
	protected $out_data;
	function __construct()
	{
		parent::__construct();
		//self::check_login();
		$this->out_data['site_url'] = $this->get_site_url();
		$this->out_data['current_function'] = '';
		$this->load->database();
		$this->load->library('session');
	}

	public function check_merchant_login(){
		$merchant_login = $this->session->userdata('merchant_login');
		if(!$merchant_login)
		{
			header("Location: /merchant_login");
		}
	}

	public function check_shike_login(){
		$shike_login = $this->session->userdata('shike_login');
		if(!$shike_login)
		{
			header("Location: /shike_login");
		}
	}

	private function check_login()
	{
		$admin_login = $this->session->userdata('admin_login');
		if(!$admin_login)
		{
			header("Location:".base_url()."login");
		}
	}

	/*连接redis*/
	protected function redis_conn()
	{
		$redis = new Redis();
		$redis->connect('127.0.0.1', 6379);
		return $redis;
	}

	/*检查管理员权限*/
	protected function check_permission($permission = 'base')
	{
		$admin_allow = explode(',', $this->session->userdata('permission') );
		if( in_array($permission, $admin_allow) ) return true;
		else header("Location:".base_url()."login");
	}

	protected function get_site_url()
	{
		$admin_url = base_url();
		$pos = strripos($admin_url, '/',-2);
		return substr($admin_url, 0, $pos).'/';
	}

	protected function is_post()
	{
		return $_SERVER['REQUEST_METHOD' ] === 'POST' ? true : false;
	}

	protected function get_pagin($base_url, $total_rows, $limit = 10, $uri_segment = 3, $page_query_string = false)
	{
		$this->load->library('pagination');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a><strong>';
		$config['cur_tag_close'] = '</strong></a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['page_query_string'] = $page_query_string;

		$this->pagination->initialize($config); 

		return $this->pagination->create_links();
	}
}
