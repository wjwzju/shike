<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_bankcard_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{
		$seller_id = $this->session->userdata('user_id');
        $bankcard = $this->db->query("select * from bankbind where user_id=$seller_id and type='1'")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        if(!$bankcard){
            $this->out_data['con_page'] = 'shike/bankcard_manage';
		    $this->load->view('shike_default', $this->out_data);
        }else{
        	$this->out_data['bankcard'] = $bankcard;
            $this->out_data['con_page'] = 'shike/bound_bankCard';
		    $this->load->view('shike_default', $this->out_data);
        }
	}
	public function delete_bankcard()
	{
		$id = $this->input->post('bankcard_id');
		$this->db->delete('bankbind', array('id' => $id));
		$result['status'] = true;
		echo json_encode($result);
	}
}