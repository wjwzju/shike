<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_issue_try3 extends MY_Controller {

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
		$this->out_data['con_page'] = 'merchant/issue_try3';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function update_fake_activity3(){
		$act_id = $this->input->post('act_id');
		$platformid = $this->input->post('platformid');
		$t_picture_url = $this->input->post('t_picture_url');
		$t_key_words = $this->input->post('t_key_words');
		$t_classify1 = $this->input->post('t_classify1');
		$t_classify2 = $this->input->post('t_classify2');
		$t_classify3 = $this->input->post('t_classify3');
		$t_classify4 = $this->input->post('t_classify4');
		$t_classify5 = $this->input->post('t_classify5');
		$t_lower_price = $this->input->post('t_lower_price');
		$t_higher_price = $this->input->post('t_higher_price');
		$t_delivery_place = $this->input->post('t_delivery_place');
		$t_sort = $this->input->post('t_sort');
		$dis_ser1 = ($this->input->post('dis_ser1')=='true') ? 1:0;
		$dis_ser2 = ($this->input->post('dis_ser2')=='true') ? 1:0;
		$dis_ser3 = ($this->input->post('dis_ser3')=='true') ? 1:0;
		$dis_ser4 = ($this->input->post('dis_ser4')=='true') ? 1:0;
		$dis_ser5 = ($this->input->post('dis_ser5')=='true') ? 1:0;
		$dis_ser6 = ($this->input->post('dis_ser6')=='true') ? 1:0;
		$dis_ser7 = ($this->input->post('dis_ser7')=='true') ? 1:0;
		$dis_ser8 = ($this->input->post('dis_ser8')=='true') ? 1:0;
		$dis_ser9 = ($this->input->post('dis_ser9')=='true') ? 1:0;
		$dis_ser10 = ($this->input->post('dis_ser10')=='true') ? 1:0;
		$dis_ser11 = ($this->input->post('dis_ser11')=='true') ? 1:0;
		// $dis_ser1 = $this->input->post('dis_ser1');
		// if($dis_ser1=='true'){
		// 	$dis_ser1=1;
		// }else{
		// 	$dis_ser1=0;
		// }
		//echo json_encode($dis_ser1);return;
		$info = array("ser_platformid" => $platformid,"t_picture_url" => $t_picture_url,"t_key_words" => $t_key_words,"t_classify1" => $t_classify1,"t_classify2" => $t_classify2,"t_classify3" => $t_classify3,"t_classify4" => $t_classify4,"t_classify5" => $t_classify5,"t_lower_price" => $t_lower_price,"t_higher_price" => $t_higher_price,"t_delivery_place" => $t_delivery_place,"t_sort"=>$t_sort,"dis_ser1"=>$dis_ser1,"dis_ser2"=>$dis_ser2,"dis_ser3"=>$dis_ser3,"dis_ser4"=>$dis_ser4,"dis_ser5"=>$dis_ser5,"dis_ser6"=>$dis_ser6,"dis_ser7"=>$dis_ser7,"dis_ser8"=>$dis_ser8,"dis_ser9"=>$dis_ser9,"dis_ser10"=>$dis_ser10,"dis_ser11"=>$dis_ser11);
		$res = $this->db->update("activity",$info,array("act_id"=>$act_id));
		echo json_encode($res);
		//echo json_encode($info);

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
}
