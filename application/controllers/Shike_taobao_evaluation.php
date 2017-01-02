<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_taobao_evaluation extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

        $order_id = $this->input->get("order_id");
		$this->out_data['order'] = $this->db->query("select * from sorder where order_id=".$order_id)->row_array();
		$user_id = $this->session->userdata('user_id');
		$this->out_data['user'] = $this->db->query("select * from user where user_id=$user_id")->row_array();
		$this->out_data['con_page'] = 'shike/taobao_evaluation';
		$this->load->view('shike_default', $this->out_data);
	}

	public function submit_comment(){
		$order_id = $this->input->post("order_id");
        $path = "images/merchant/order/".$order_id;
        if (is_dir($path)){  

        }else{
           mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
        }        
        $tmp_file = $_FILES['comment_img']['tmp_name'];
        $filename = $_FILES['comment_img']['name'];
        $image_link = "images/merchant/order/".$order_id."/".$filename;
        $res = move_uploaded_file($tmp_file,$image_link);
        $info = array(
        	'comment_img' => $image_link,
            'status' => 3
        );

    	
        $this->db->update('sorder', $info,array("order_id"=>$order_id));
        header("Location: /shike_try_winningManage");
        exit();
	}
}
