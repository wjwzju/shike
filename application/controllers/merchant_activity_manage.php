<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_activity_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

		$seller_id = $this->session->userdata('seller_id');

		$date = date('Y-m-d H:i:s',time());
		$where = "(UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(gene_time))>172800) and status != 4 ";
		$res = $this->db->update("activity",array("status"=>5),$where);

		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$orderwhere = " where seller_id=$seller_id and isreal=1";
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			$base_url = "/merchant_activity_manage/?";
		}else{
			$orderwhere .= " and status=".$order_status;
			$base_url = "/merchant_activity_manage/?order_status=".$order_status;
		}

		$count = $this->db->query("select count(*) as count from activity".$orderwhere)->row_array();
		$count = $count['count'];

		$this->out_data['activity_list'] = $this->db->query("select * from activity".$orderwhere." limit {$start},{$limit}")->result_array();
        $this->out_data['sum_activity_list'] = $this->db->query("select count(*) as count from activity where seller_id=$seller_id and isreal=1")->row_array();
        $this->out_data['sum_1_activity_list'] = $this->db->query("select count(*) as count from activity where status=1 and seller_id=$seller_id and isreal=1")->row_array();
        $this->out_data['sum_2_activity_list'] = $this->db->query("select count(*) as count from activity where status=2 and seller_id=$seller_id and isreal=1")->row_array();
        $this->out_data['sum_3_activity_list'] = $this->db->query("select count(*) as count from activity where status=3 and seller_id=$seller_id and isreal=1")->row_array();
        $this->out_data['sum_4_activity_list'] = $this->db->query("select count(*) as count from activity where status=4 and seller_id=$seller_id and isreal=1")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];

		//$base_url = "/merchant_activity_manage/?";
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);

		$this->out_data['con_page'] = 'merchant/activity_manage';
		$this->load->view('merchant_default', $this->out_data);
	}

	public function cancle_activity(){
		$act_id = $this->input->post('actid');
		$res = $this->db->update("activity",array("status"=>'5'),array('act_id'=>$act_id));
		echo json_encode($res);
		// echo 1;
	}

	public function check_pay(){
		$pwd = $this->input->post('pwd');
		$act_id = $this->input->post('act_id');
		$seller_id=$this->session->userdata('seller_id');
		$seller_info=$this->db->query("select * from seller where seller_id={$seller_id}")->row_array();
		if ($seller_info["paypw"] != md5($pwd)){
            $res = 0;
            echo json_encode($res);
		}else{
		    $avail = $seller_info["avail_deposit"];
		    $act = $this->db->query("select * from activity where act_id={$act_id}")->row_array();
		    $need_pay = $act["total_money"];
		    $freeze_deposit = $seller_info["freeze_deposit"];
            $info = array('avail_deposit' => $avail-$need_pay,
            	          'freeze_deposit' => $freeze_deposit+$need_pay);
		    $this->db->update("seller",$info,array("seller_id"=>$seller_id));
            $this->db->update("activity",array('status' => 2),array("act_id"=>$act_id));
		    $res = 1;
		    echo json_encode($res);
	    }
	}
}
