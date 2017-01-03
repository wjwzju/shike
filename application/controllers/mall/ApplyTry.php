<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class applyTry extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //是否申请过
    public function isApply()
    {
        $act_id = $this->input->post('act_id');
        if(!isset($_SESSION['user_id']))
        {
            $data = array(
                'success'=>false,
                'code'=>2,
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit;
        }
        $user_id = $this->session->userdata('user_id');
        $res = $this->db->query("select * from apply where act_id = $act_id and user_id = $user_id")->row_array();
        if(count($res))
        {
            $data = array(
                'success'=>false,
                'code'=>1,
                'data'=>$this->out_data
            );
        }else
        {
            $data = array(
                'success'=>true,
                'code'=>0,
                'data'=>$this->out_data
            );
        }
        echo json_encode($data);
    }

    //第一步
    public function applyTry_one($act_id)
    {
        $this->out_data['product_details'] = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $this->out_data['act_id'] = $act_id;
        $this->load->view('mall/header');
        $this->load->view('mall/applyTry_one',$this->out_data);
        $this->load->view('mall/footer');
    }

    //第而步
    public function applyTry_two($act_id)
    {
        $this->out_data['product_details'] = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $this->out_data['act_id'] = $act_id;
        $seller_id = $this->out_data['product_details']['seller_id'];
        $shop_name = $this->out_data['product_details']['shopname'];
        $shop_info = $this->db->query("select * from shop where seller_id = {$seller_id} and shop_name = '$shop_name'")->row_array();
        $this->out_data['shop_info'] = $shop_info;
        $this->load->view('mall/header');
        $this->load->view('mall/applyTry_two',$this->out_data);
        $this->load->view('mall/footer');
    }

    //第三步
    public function applyTry_three($act_id)
    {
        $this->out_data['product_details'] = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $this->out_data['act_id'] = $act_id;
        $this->load->view('mall/header');
        $this->load->view('mall/applyTry_three',$this->out_data);
        $this->load->view('mall/footer');
    }

    //申请试用
    public function apply_product()
    {
        $act_id = $this->input->post('act_id');
        $product_details = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $user_id = $this->session->userdata('user_id');
        $product_name = $product_details['product_name'];
        $shopname = $product_details['shopname'];
        $platformid = $product_details['platformid'];
        $amount_perorder = $product_details['amount_perorder'];
        $price = $product_details['unit_price'];
        $apply_time = date('Y-m-d H:i:s',time());
        $apply_status = 1;
        $picture_url = $product_details['picture_url'];
        $temp = array(
            'act_id'=>$act_id,
            'user_id'=>$user_id,
            'product_name'=>$product_name,
            'shopname'=>$shopname,
            'platformid'=>$platformid,
            'amount_perorder'=>$amount_perorder,
            'price'=>$price,
            'apply_time'=>$apply_time,
            'apply_status'=>$apply_status,
            'picture_url'=>$picture_url
        );
        $this->db->insert('apply',$temp);
        $apply_id = $this->db->insert_id();
        $this->db->query("update activity set applyed_num = applyed_num + 1 where act_id = $act_id");
        if($apply_id)
        {
            $data = array(
                'success'=>true,
                'code'=>0,
                'data'=>$this->out_data
            );
        }else
        {
            $data = array(
                'success'=>false,
                'code'=>1,
                'data'=>$this->out_data
            );
        }
        echo json_encode($data);
    }
}