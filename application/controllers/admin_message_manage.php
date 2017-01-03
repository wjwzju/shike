<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_message_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from message_type")->row_array();
		$count = $count['count'];
		$base_url = "/admin_message_manage/?";
		$this->out_data['messages'] = $this->db->query("select * from message_type limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/message_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function create_message(){
		$user_type = $this->input->post('user_type');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$time = date('Y-m-d H:i:s',time());
		$info = array('user_type' => $user_type,
			          'time' => $time,
			          'title' => $title,
			          'description' => $description);
		$this->db->insert('message_type', $info);
		$message_id = $this->db->insert_id();
		if($user_type == 0){
			$users = $this->db->query("select user_id from user")->result_array();
			foreach ($users as $user) {
				$info = array('description' => $description, 
					          'message_time' => $time,
					          'user_id' => $user['user_id'],
					          'status' => 0,
					          'title' => $title,
					          'user_type' => $user_type,
					          'message_id' => $message_id);
				$res = $this->db->insert("message", $info);
			}
		}else{
			$sellers = $this->db->query("select seller_id from seller")->result_array();
			foreach ($sellers as $seller) {
                $info = array('description' => $description, 
					          'message_time' => $time,
					          'user_id' => $seller['seller_id'],
					          'status' => 0,
					          'title' => $title,
					          'user_type' => $user_type,
					          'message_id' => $message_id);
                $res = $this->db->insert("message", $info);
			}
		}
		echo json_encode($res);
	}
	public function edit_message(){
		$message_id = $this->input->post('message_id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$this->db->update("message_type",array("title"=>$title,"description"=>$description),array("message_id"=>$message_id));
		$messages = $this->db->query("select id from seller where message_id={$message_id}")->result_array();
		$res = $this->db->update("message",array("title"=>$title,"description"=>$description),$messages);
		echo json_encode($res);
	}
}