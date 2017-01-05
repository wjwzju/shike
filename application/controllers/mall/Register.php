<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    //试客注册页
    public function shike_register()
    {
        $this->load->view('mall/login_header');
        $this->load->view('mall/shike_register');
        $this->load->view('mall/footer');
    }

    //商家注册页
    public function merchant_register()
    {
        $this->load->view('mall/login_header');
        $this->load->view('mall/merchant_register');
        $this->load->view('mall/footer');
    }

    //检查用户名是否重复
    public function check_username()
    {
        $user_name = $this->input->post('user_name');
        $type = $this->input->post('type');
        if($type == 1)
        {
            //注册试客
            $res = $this->db->query("select * from user where user_name = '$user_name'")->row_array();
        }elseif($type == 2)
        {
            //注册商家
            $res = $this->db->query("select * from seller where user_name = '$user_name'")->row_array();
        }
        if(count($res))
        {
            $data = array(
                'success'=>false,
                'code'=>1,//用户名已被注册
                'data'=>$this->out_data
            );
        }else
        {
            $data = array(
                'success'=>true,
                'code'=>0,//用户名已被注册
                'data'=>$this->out_data
            );
        }
        echo json_encode($data);
    }

    //注册试客
    public function register_shike()
    {
        $user_name = $this->input->post('user_name');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $user_qq = $this->input->post('user_qq');
        $verification_code = $this->input->post('verification_code');
        //判断手机号是否注册
        $res = $this->db->query("select * from user where phone = $phone")->row_array();
        $res2 = $this->db->query("select * from seller where tel = $phone")->row_array();
        if(count($res) || count($res2))
        {
            $data = array(
                'success'=>false,
                'code'=>1,//手机已注册
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit ;
        }
        //验证验证码
        $code_info = $this->db->query("select * from telcode where telephone = '{$phone}' and status = 1 order by time DESC limit 1")->row_array();
        if($verification_code != $code_info['authcode'])
        {
            $data = array(
                'success'=>false,
                'code'=>2,//验证码不正确
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit ;
        }
        $this->db->query("update telcode set status = 2 where session_id = '{$code_info['session_id']}'");
        $password = md5($password);
        $reg_time = date('Y-m-d H:i:s',time());
        $taobao_status = 0;
        $level = 1;
        $money_use = 0;
        $return_num = 0;
        $temp = array(
            'user_name'=>$user_name,
            'phone'=>$phone,
            'user_qq'=>$user_qq,
            'password'=>$password,
            'reg_time'=>$reg_time,
            'taobao_status'=>$taobao_status,
            'level'=>$level,
            'money_use'=>$money_use,
            'return_num'=>$return_num
        );
        $this->db->insert('user',$temp);
        $user_id = $this->db->insert_id();
        /*$this->session->set_userdata('user_name', $user_name);
        $this->session->set_userdata('seller_id', $user_id);*/
        //TODO 登录
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //注册商家
    public function register_merchant()
    {
        $user_name = $this->input->post('user_name');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $user_qq = $this->input->post('user_qq');
        $verification_code = $this->input->post('verification_code');
        //判断手机号是否注册
        $res = $this->db->query("select * from user where phone = $phone")->row_array();
        $res2 = $this->db->query("select * from seller where tel = $phone")->row_array();
        if(count($res) || count($res2))
        {
            $data = array(
                'success'=>false,
                'code'=>1,//手机已注册
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit ;
        }
        // 验证验证码
        $code_info = $this->db->query("select * from telcode where telephone = '{$phone}' and status = 1 order by time DESC limit 1")->row_array();
        if($verification_code != $code_info['authcode'])
        {
            $data = array(
                'success'=>false,
                'code'=>2,//验证码不正确
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit ;
        }
        $this->db->query("update telcode set status = 2 where session_id = '{$code_info['session_id']}'");
        $password = md5($password);
        $reg_time = date('Y-m-d H:i:s',time());
        $temp = array(
            'user_name'=>$user_name,
            'tel'=>$phone,
            'qq'=>$user_qq,
            'passwd'=>$password,
            'reg_time'=>$reg_time,
            'level'=>1
        );
        $this->db->insert('seller',$temp);
        $user_id = $this->db->insert_id();
        /*$this->session->set_userdata('user_name', $user_name);
        $this->session->set_userdata('user_id', $user_id);*/
        /*echo json_encode($_SESSION);
        exit;*/
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }
}