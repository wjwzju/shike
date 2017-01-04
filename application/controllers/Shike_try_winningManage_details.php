<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_try_winningManage_details extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$order_id = $this->input->get('order_id');

        $this->out_data['order'] = $this->db->query("select * from sorder where order_id=$order_id")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
		
		$this->out_data['con_page'] = 'shike/try_winningManage_details';
		$this->load->view('shike_default', $this->out_data);
	}
}