<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_get_order4 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

        $user_id = $this->session->userdata('user_id');
		$order_id = $this->input->get("order_id");
		$orderinfo = $this->db->query("select * from sorder where order_id=".$order_id)->row_array();
		$userinfo = $this->db->query("select * from user where user_id=".$user_id)->row_array();
		$this->out_data['orderinfo'] = $orderinfo;
		$this->out_data['userinfo'] = $userinfo;
		$this->out_data['user_id'] = $user_id;
		$this->out_data['con_page'] = 'shike/get_order4';
		$this->load->view('shike_default', $this->out_data);
	}

	public function submit_order4(){
		$user_id = $this->session->userdata('user_id');
		$order_id = $this->input->post('order_id');
		$path = "images/shike/chatlog/".$user_id;
		if(is_dir($path)){  

      	}else{
         	mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
      	}
      	$tmp_file = $_FILES['chatlog']['tmp_name'];
      	$filename = $_FILES['chatlog']['name'];
     	$chatlog = "images/shike/chatlog/".$user_id."/".$filename;
      	$res = move_uploaded_file($tmp_file,$chatlog);

      	$info = array(
      		'chatlog_img'=>$chatlog);
      	$this->db->update("sorder",$info,array("order_id"=>$order_id));
      	header("Location: /shike_get_order5?order_id={$order_id}");
        exit();
	}
}
