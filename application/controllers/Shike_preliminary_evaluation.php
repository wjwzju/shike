<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_preliminary_evaluation extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{
		$order_id = $this->input->get("order_id");
		$this->out_data['order'] = $this->db->query("select * from sorder where order_id=".$order_id)->row_array();    
		$this->out_data['con_page'] = 'shike/preliminary_evaluation';
		$this->load->view('shike_default', $this->out_data);
	}
	public function submit_comment(){
		$comment_detail = $this->input->post("comment_detail");
		
		$order_id = $this->input->post("order_id");
        $path = "images/merchant/order/".$order_id;
        if (is_dir($path)){  

        }else{
           mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
        }        
        $tmp_file1 = $_FILES['shaidan1_img']['tmp_name'];
        $tmp_file2 = $_FILES['shaidan2_img']['tmp_name'];
        $tmp_file3 = $_FILES['shaidan3_img']['tmp_name'];
        $tmp_file4 = $_FILES['shaidan4_img']['tmp_name'];
        $tmp_file5 = $_FILES['shaidan5_img']['tmp_name'];
        $filename1 = $_FILES['shaidan1_img']['name'];
        $filename2 = $_FILES['shaidan2_img']['name'];
        $filename3 = $_FILES['shaidan3_img']['name'];
        $filename4 = $_FILES['shaidan4_img']['name'];
        $filename5 = $_FILES['shaidan5_img']['name'];
        $image_link1 = "images/merchant/order/".$order_id."/".$filename1;
        $image_link2 = "images/merchant/order/".$order_id."/".$filename2;
        $image_link3 = "images/merchant/order/".$order_id."/".$filename3;
        $image_link4 = "images/merchant/order/".$order_id."/".$filename4;
        $image_link5 = "images/merchant/order/".$order_id."/".$filename5;
        $res1 = move_uploaded_file($tmp_file1,$image_link1);
        $res2 = move_uploaded_file($tmp_file2,$image_link2);
        $res3 = move_uploaded_file($tmp_file3,$image_link3);
        $res4 = move_uploaded_file($tmp_file4,$image_link4);
        $res5 = move_uploaded_file($tmp_file5,$image_link5);
        $info = array(
        	'comment_detail' => $comment_detail,
        	'shaidan1_img' => $image_link1,
	        'shaidan2_img' => $image_link2,
	        'shaidan3_img' => $image_link3,
	        'shaidan4_img' => $image_link4,
	        'shaidan5_img' => $image_link5,
	        'status' => 2,
        );

    	
        $this->db->update('sorder', $info,array("order_id"=>$order_id));
        header("Location: /shike_try_winningManage");
        exit();
	}
}
