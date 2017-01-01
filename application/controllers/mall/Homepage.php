<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->out_data['newest_list'] = $this->db->query("select * from activity where status = 3 and isreal = 1 order by gene_time DESC limit 8")->result_array();
        $this->out_data['recommend_list'] = $this->db->query("select * from activity where status = 3  and isreal = 1 order by apply_amount ASC limit 100")->result_array();
        $this->out_data['recommend_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        /*echo json_encode($this->out_data);
        exit;*/
        $this->load->view('mall/header');
        $this->load->view('mall/index',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取推荐试用商品
    public function getRecommend()
    {
        $page = $this->input->post('page');
        //$limit = 100;
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['recommend_list'] = $this->db->query("select * from activity where status = 3  and isreal = 1 order by apply_amount ASC limit $start, $limit")->result_array();
        $this->out_data['recommend_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->result_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    public function hottest()
    {
        $this->out_data['hottest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $this->load->view('mall/header');
        $this->load->view('mall/hottest',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取最热试用商品
    public function getHottest()
    {
        $page = $this->input->post('page');
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['hottest_list'] = $this->db->query("select * from activity where status = 3 and isreal = 1 order by apply_amount DESC limit $start , $limit")->result_array();
        $this->out_data['hottest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //最新试用
    public function newest()
    {
        $this->out_data['newest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $this->load->view('mall/header');
        $this->load->view('mall/newest',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取最新试用商品
    public function getNewest()
    {
        $page = $this->input->post('page');
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['newest_list'] = $this->db->query("select * from activity where status = 3  and isreal = 1 order by gene_time DESC limit $start , $limit")->result_array();
        $this->out_data['newest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //商品分类页
    public function classify($classify)
    {
        //$this->out_data['classify_list'] = $this->db->query("select * from activity where status = 3 and product_classify = $classify order by gene_time ASC limit $start , $limit")->result_array();
        $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_classify = $classify")->row_array();
        $this->out_data['classify'] = $classify;
        $this->load->view('mall/header');
        $this->load->view('mall/classify_page',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取分类商品
    public function getClassify()
    {
        $classify = $this->input->post('classify');
        $page = $this->input->post('page');
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['classify_list'] = $this->db->query("select * from activity where status = 3  and isreal = 1 and product_classify = $classify order by gene_time ASC limit $start , $limit")->result_array();
        $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_classify = $classify")->row_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //搜索页
    public function search($search)
    {
        $search = urldecode($search);
        $page = 1;
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['search_list'] = $this->db->query("select * from activity where status = 3 and isreal = 1 and product_name like '%$search%' order by gene_time DESC limit $start , $limit")->result_array();
        $this->out_data['search_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_name like '%$search%' ")->row_array();
        $this->out_data['search'] = $search;
        $this->load->view('mall/header');
        $this->load->view('mall/search',$this->out_data);
        $this->load->view('mall/footer');
    }

    //分页刷新搜索
    public function searchList()
    {
        $search = $this->input->post('search');
        $page = $this->input->post('page');
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['search_list'] = $this->db->query("select * from activity where status = 3 and isreal = 1 and product_name like '%$search%' order by gene_time DESC limit $start , $limit")->result_array();
        $this->out_data['search_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_name like '%$search%'")->row_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //商品详情
    public function productDetails($act_id)
    {
        //$act_id = $this->input->post('data');
        $need = 'act_id,picture_url, product_name, unit_price, freight, buy_sum, apply_amount, color, size, gene_time, product_details,apply_count';
        $this->out_data['product_details'] = $this->db->query("select $need from activity where act_id = $act_id and isreal = 1")->row_array();
        //申请人数
        $applyed_num = $this->db->query("select count(1) as count from apply where act_id = $act_id")->row_array();
        $this->out_data['product_details']['apply_count'] = $applyed_num['count'];
        $need2 = 'act_id, picture_url,product_name, unit_price, apply_amount, freight';
        $this->out_data['seller_else'] = $this->db->query("select $need2 from activity where status = 3 and isreal = 1 and act_id != $act_id order by gene_time DESC limit 2")->result_array();
        $this->out_data['apply_else'] = $this->db->query("
        select a1.act_id, a1.product_name,a1.picture_url, a1.unit_price, a1.apply_count, a1.apply_amount, a1.freight
        from apply as a2
        join activity as a1 on a2.act_id =  a1.act_id
        where a2.act_id = $act_id and a2.act_id != $act_id and a1.isreal = 1
        order by a1.gene_time DESC
        limit 2
        ")->result_array();
        //已申请试用用户
        $this->out_data['apply_user'] = $this->db->query("
        select u.user_name
        from apply as a
        join user as u on a.user_id = u.user_id
        where a.act_id = $act_id
        order by a.apply_time DESC
        ")->result_array();
        /*echo json_encode($this->out_data);
        exit;*/
        $this->load->view('mall/header');
        $this->load->view('mall/details',$this->out_data);
        $this->load->view('mall/footer');
    }

    //公告
    public function affiche_details()
    {
        $this->load->view('mall/header');
        $this->load->view('mall/affiche_details',$this->out_data);
        $this->load->view('mall/footer');
    }
}