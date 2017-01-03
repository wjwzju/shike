<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class help_center extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function help_center()
    {
        $this->load->view('mall/header');
        $this->load->view('help_center/help_center');
        $this->load->view('mall/footer');
    }

    public function shike_aboutShike()
    {
        //$this->load->view('mall/header');
        //$this->load->view('help_center/helpCenter_leftNav');
        $this->load->view('help_center/shike_aboutShike');
        //$this->load->view('mall/footer');
    }

    public function merchant_aboutAccount()
    {
        $this->load->view('help_center/merchant_aboutAccount');
    }

    public function merchant_aboutShike()
    {
        $this->load->view('help_center/merchant_aboutShike');
    }

    public function merchant_aboutTry()
    {
        $this->load->view('help_center/merchant_aboutTry');
    }

    public function merchant_process()
    {
        $this->load->view('help_center/merchant_process');
    }

    public function shike_aboutAccount()
    {
        $this->load->view('help_center/shike_aboutAccount');
    }

    public function shike_aboutTry()
    {
        $this->load->view('help_center/shike_aboutTry');
    }

    public function shike_process()
    {
        $this->load->view('help_center/shike_process');
    }

    //服务协议
    public function service_agreement()
    {
        $this->load->view('help_center/service_agreement');
    }
}