<?php
/**
 * Created by PhpStorm.
 * User: WJW
 * Date: 2017/1/3
 * Time: 18:53
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Shell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->dir = date("Y_m", time());
        $this->file = date("Y_m_d", time());
        if (!file_exists(APPPATH . 'logs/shell' . $this->dir)) {
            mkdir(APPPATH . 'logs/shell' . $this->dir, 0755);
        }
    }

    //7天后下线商品 每分钟执行
    ///usr/bin/php ../var/www/html/shike/index.php shell underCarriage
    public function underCarriage()
    {
        $start_time = time() - 7*24*3600;
        $this->db->query("update activity set status = 5 where unix_timestamp(gene_time) <= $start_time and status = 3 and isreal = 1");
        error_log(date("Y-m-d H:i:s", time()) . " sql:  " . $this->db->last_query(). chr(10), 3, APPPATH . "logs/shell" . $this->dir . "/underCarriage_" . $this->file . ".php");
    }

    //抽奖 每天00:00-00:01
    public function drawLottery()
    {
        $act_info = $this->db->query("select * from activity where status = 3 and isreal = 1")->result_array();
        foreach($act_info as $k=>$v)
        {
            $act_id = $v['act_id'];
            $apply_amount = $v['apply_amount'];//总份数
            $gene_time = strtotime($v['gene_time']);
            $apply_info = $this->db->query("select a.apply_time, u.level,u.user_id from apply as a
                join user as u on a.user_id = u.user_id
                where a.act_id = $act_id and a.apply_status = 1")
                ->result_array();
            $first_apply = $this->db->query("select apply_time from apply where act_id = $act_id order by apply_time ASC limit 1")->row_array();
            $first_apply_time =
            $apply_time = $apply_info['apply_time'];
            $user_level = $apply_info['level'];
            $user_id = $apply_info['user_id'];
            $draw_time = date("Y-m-d 00:00:00",strtotime("$apply_time +1 day"));
            $applyed_count = 0;//总申请人数
            $vip_user = array();
            $common_user = array();
            if($user_level == 1)
            {
                array_push($common_user,$user_id);
            }elseif($user_level == 2)
            {
                array_push($vip_user,$user_id);
            }

        }
    }

    function choujiang($a, $b, $win_count)
    {
        /*$win_count = 4;
        $a = array(1, 6, 9);
        $b = array(7, 5,10,14,12,11,2);*/
        $c = array('a');
        $d = array('a');
        while(count($c) <= 2)
        {
            $r = mt_rand(1,count($a)+count($b));
            echo $r.'<br>';
            if($r <= count($a)*2)
            {
                $index = ($r%2)?(integer)$r/2:$r/2-1;
                if(array_search($a[$index],$c))
                {

                }else
                {
                    array_push($c,$a[$index]);
                }
            }else
            {
                $index = $r - 2 * count($a) - 1;
                if(array_search($b[$index],$c))
                {

                }else
                {
                    array_push($c,$b[$index]);
                }
            }
        }
        while(count($d) <= 2)
        {
            $r = mt_rand(1,count($a)+count($b));
            echo $r.'<br>';
            if($r <= count($a)*2)
            {
                $index = ($r%2)?(integer)$r/2:$r/2-1;
                if(array_search($a[$index],$d) || array_search($a[$index],$c))
                {

                }else
                {
                    array_push($d,$a[$index]);
                }
            }else
            {
                $index = $r - 2 * count($a) - 1;
                if(array_search($b[$index],$d) || array_search($b[$index],$c))
                {

                }else
                {
                    array_push($d,$b[$index]);
                }
            }
        }
        array_shift($c);
        array_shift($d);
        return array($c ,$d);
    }

}