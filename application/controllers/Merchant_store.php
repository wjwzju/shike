<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type:text/html;charset=utf-8");
class Merchant_store extends MY_Controller {

	function __construct()
	{
		parent::__construct();
    parent::check_merchant_login();
	}

	public function index()
	{
      $seller_id = $this->session->userdata('seller_id');
      $this->out_data['shops'] = $this->db->query("select * from shop where seller_id={$seller_id}")->result_array();
		  $this->out_data['con_page'] = 'merchant/store';
      $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
      $this->out_data['qq'] = $this->out_data['qq']['qq'];
      $this->out_data['pwd'] = $this->get_random("8");
		  $this->load->view('merchant_default', $this->out_data);
	}

	function change_content()
	{
		$shop_id = $this->input->post('shop_id');
		$chargeqq = $this->input->post('chargeqq');
		$chargewx = $this->input->post('chargewx');
		$chargetel = $this->input->post('chargetel');

		$info = array('chargeqq' => $chargeqq);
		if ($chargewx){
			$info['chargewx'] = $chargewx;
		}
		if ($chargetel){
			$info['chargetel'] = $chargetel;
		}
		$this->db->update('shop', $info, array('shop_id' => $shop_id));
		exit();
	}
    function submit_new_shop()
    {
        $seller_id = $this->session->userdata('seller_id');
        $path = "images/merchant/shop/".$seller_id;
        if (is_dir($path)){  

        }else{
           mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
        }        
        $tmp_file = $_FILES['shop_logo']['tmp_name'];
        $filename = $_FILES['shop_logo']['name'];
        $logo_link = "images/merchant/shop/".$seller_id."/".$filename;
        $res = move_uploaded_file($tmp_file,$logo_link);
    	  $shop_link = $this->input->post('shop_url');
        $shop_name = $this->input->post('shop_name');
        $wangwang  = $this->input->post('wangwang');
        $good_url  = $this->input->post('good_url');
        $chargeqq  = $this->input->post('principal_qq');
        $chargewx  = $this->input->post('principal_weChat');
        $chargetel = $this->input->post('principal_phone');
        if (strstr($shop_link,"taobao",true)){
            $platform_id = "1";
        }else{
            $platform_id = "2";
        }
        $time = date('y-m-d h:i:s',time());
        $info = array('seller_id' => $seller_id,
        	          'shop_link' => $shop_link,
        	          'shop_name' => $shop_name,
        	          'wangwang' => $wangwang,
                      'platform_id' => $platform_id,
                      'chargeqq' => $chargeqq,
                      'chargewx' => $chargewx,
                      'chargetel' => $chargetel,
                      'bind_time' => $time,
                      'logo_link' => $logo_link
                      );
        $this->db->insert('shop', $info);
        header("Location: /merchant_store");
        exit();
    }
    public function get_random($length){
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        $key = "";
        for($i=0;$i<$length;$i++){
            $key .= $pattern{mt_rand(0,61)}; //生成php随机数
        }
        return $key;
    }
}
