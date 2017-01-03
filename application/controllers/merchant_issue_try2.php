<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type: text/html; charset=utf-8");
class Merchant_issue_try2 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        // $user_id = $this->session->userdata('user_id');
		$user_id=$this->session->userdata('seller_id');
		$this->out_data['act_id'] = $this->input->get('act_id');
		$activity_sellerid = $this->db->query('select seller_id from activity where act_id='.$this->out_data['act_id'])->row_array();
		if($user_id != $activity_sellerid['seller_id']){
			echo "不可允许的访问";
			return;
		}
		$this->out_data['seller_id'] = $user_id;
		$this->out_data['shoplist'] = $this->db->query("select * from shop where seller_id=".$user_id)->result_array();
		$this->out_data['activity'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		//var_dump($this->out_data);die();
		$this->out_data['con_page'] = 'merchant/issue_try2';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function update_fake_activity2(){
		
		$act_id = $this->input->post('act_id');
		$commodity_name = $this->input->post('commodity_name');
		$shop_url = $this->input->post('shop_url');
		$commodity_classify = $this->input->post('commodity_classify');
		$commodity_picture = $this->input->post('commodity_picture');
		$thecolor = $this->input->post('thecolor');
		$thesize = $this->input->post('thesize');
		$unit_price = $this->input->post('unit_price');
		$buy_sum = $this->input->post('buy_sum');
		$freight = $this->input->post('freight');
		$margin = $this->input->post('margin');
		$total_money = $margin*5*1.05;
		$guarantee = $margin*5*0.05;
		$deposit = $margin*5;
        $data = $this->get_act_detail($shop_url);
		$info = array("product_name" => $commodity_name,"product_link" => $shop_url,"product_classify" => $commodity_classify,"picture_url" => $commodity_picture,"color" => $thecolor,"size" => $thesize,"unit_price" => $unit_price,"buy_sum" => $buy_sum,"freight" => $freight,"product_details" =>$data, "margin" => $margin, "total_money" => $total_money,"guarantee" => $guarantee, "deposit" => $deposit);
		$res = $this->db->update("activity",$info,array("act_id"=>$act_id));
		echo json_encode($res);

	}
	public function update_confirm_ship(){
		$wuliu = $this->input->post('wuliu');
		$yundan = $this->input->post('yundan');
		$order_id = $this->input->post('order_id');
		$info = array("wuliu"=>$wuliu,"yundan"=>$yundan,'status'=>2);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}

	public function update_shenhe(){
		$order_id = $this->input->post('order_id');
		$info = array('status'=>3);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}
    public function get_act_detail($url){
        $shop_url = str_replace("&","$$",$url);
        $main_url = "http://120.27.143.236:8012/goodsInfo/getItemDescByItemUrl?itemUrl=";
        $full_url = $main_url."".$shop_url;
        $ch = curl_init();
        $timeout = 5;
        curl_setopt ($ch, CURLOPT_URL, $full_url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $res = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($res)->data;
        return $data;
    }

}
