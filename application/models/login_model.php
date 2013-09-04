<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function login()
	{
		$this->load->helper('url');
				
		$sql = "SELECT user_id, email, password, user_type_id
				FROM users
				WHERE email = ? AND password = MD5(?)";
			
		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		
		$result = $this->db->query($sql, $data);
		
		$user = $result->result();
		
		if($user){
			return $this->db->select('users', $user);
		}else{
			
			$email = explode("@", $this->input->post('email'));
			
			if($email[1] == "fullsail.edu"){
				$user_type_id = 4;	
			}elseif($email[1] == "fullsail.com"){
				$user_type_id = 2;
			}else{
				return $this->db->select('users', $user);	
			}
						
			$sql_insert = "INSERT into users(email, password, user_type_id)
					VALUES (?,MD5(?), ?);";
					
			$data = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'user_type_id' => $user_type_id
			);
					
			$result = $this->db->query($sql_insert, $data);
			
			$sql_select = "SELECT user_id, email, password, user_type_id
							FROM users
							WHERE email = ? AND password = MD5(?)";
							
			$result = $this->db->query($sql_select, $data);
			
			$user = $result->result();
			
			return $this->db->select('users', $user);
		}
	}
}