<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_message_details extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{
		
		$message_id = $this->input->get('message_id');
        $info = array('status'=>1);
		$res = $this->db->update("message",$info,array("id"=>$message_id));
		$this->out_data['message'] = $this->db->query("select * from message where id={$message_id}")->row_array();
		$this->out_data['con_page'] = 'shike/message_details';
		$this->load->view('shike_default', $this->out_data);
	}
}