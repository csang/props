<?php
class Props_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_staff()
	{
		$this->load->helper('url');
				
		$sql = "SELECT user_id, concat(first_name,' ',last_name) as name
				FROM users
				WHERE user_type_id = 2";
		
		$result = $this->db->query($sql);
		
		$staff = $result->result();
		
		return $this->db->select('users', $staff);
	}
	
	public function get_users()
	{
		$this->load->helper('url');
				
		$sql = "SELECT user_id, concat(first_name,' ',last_name) as name, email
				FROM users
				WHERE user_type_id != 1";
		
		$result = $this->db->query($sql);
		
		$users = $result->result();
		
		return $this->db->select('users', $users);
	}
	
	public function get_staff_selected()
	{
		$this->load->helper('url');
				
		$sql = "SELECT user_id
				FROM users
				WHERE concat(first_name, ' ',last_name) = ?";
				
		$data = array('to' => $this->input->post('to'));
		
		$result = $this->db->query($sql, $data);
		
		$staff = $result->result();
		
		return $this->db->select('users', $staff);
	}
	
	public function get_props_selected($prop_id = 0)
	{
		if ($prop_id === FALSE)
		{
			$query = $this->db->get('props');
			return $query->result_array();
		}
		
		$sql = "SELECT prop_id, is_anonymous, amount, why, category_id, concat(first_name,' ',last_name) as to_user 
				FROM props p
				JOIN users u on u.user_id = p.to_user_id 
				WHERE prop_id = ?";
		
		$data = array('prop_id' => $this->input->post('prop_id'));
		
		$result = $this->db->query($sql, $data);
		
		$props = $result->result();
		
		return $this->db->select('props', $props);
	}
	
	public function get_props()
	{
		if($_SESSION["logged_in"] == 0){
			$sql = "SELECT prop_id, s.email, u.email as from_user,
						concat(s.first_name,' ',s.last_name) as to_user,
						is_anonymous, amount, why, category
				FROM props p
				JOIN users u on u.user_id = p.from_user_id
				JOIN users s on s.user_id = p.to_user_id
				JOIN categories c on c.category_id = p.category_id
				ORDER BY prop_id desc
				LIMIT 3;";
		}else{
			$sql = "SELECT prop_id, s.email, u.email as from_user,
							concat(s.first_name,' ',s.last_name) as to_user,
							is_anonymous, amount, why, category
					FROM props p
					JOIN users u on u.user_id = p.from_user_id
					JOIN users s on s.user_id = p.to_user_id
					JOIN categories c on c.category_id = p.category_id
					ORDER BY prop_id desc;";
		}
						
		$result = $this->db->query($sql);
		
		$props = $result->result();
		
		return $this->db->select('props', $props);
	}
	
	public function search()
	{
		$sql = "SELECT prop_id, s.email, u.email as from_user,
						concat(s.first_name,' ',s.last_name) as to_user,
						is_anonymous, amount, why, category
				FROM props p
				JOIN users u on u.user_id = p.from_user_id
				JOIN users s on s.user_id = p.to_user_id
				JOIN categories c on c.category_id = p.category_id
				WHERE concat(s.first_name, ' ',s.last_name) LIKE concat(?, '%') OR
				u.email LIKE concat(?, '%') OR s.email LIKE concat(?, '%')
				ORDER BY prop_id desc";
				
		$data = array(
			'searchS' => $this->input->post('search'),
			'searchUmail' => $this->input->post('search'),
			'searchSmail' => $this->input->post('search')
		);
						
		$result = $this->db->query($sql, $data);
		
		$props = $result->result();
		
		return $this->db->select('props', $props);
	}
	
	public function set_props()
	{
		$this->load->helper('url');
		
		$sql = "INSERT into props
				(from_user_id, to_user_id, amount, why, is_anonymous, category_id)
				values(?,?,?,?,?,?)"; 
		
		$data = array(
			'from_user_id' => $_SESSION["user_id"],
			'to_user_id' => $_SESSION["staff_selected"],
			'amount' => $this->input->post('amount'),
			'why' => $this->input->post('why'),
			'is_anonymous' => $this->input->post('anonymous'),
			'category_id' => $this->input->post('category')
		);
				
		return $this->db->query($sql, $data);
	}
	
	public function update_props()
	{
		$this->load->helper('url');
				
		$sql = "UPDATE props
				SET is_anonymous = ?,
					amount = ?,
					why = ?,
					category_id = ?
				WHERE prop_id = ?";
				
		$data = array(
			'is_anonymous' => $this->input->post('anonymous'),
			'amount' => $this->input->post('amount'),
			'why' => $this->input->post('why'),
			'category_id' => $this->input->post('category'),
			'prop_id' => $this->input->post('prop_id')
		);
		
		$result = $this->db->query($sql, $data);
	}
	
	public function delete_props()
	{
		$this->load->helper('url');
				
		$sql = "DELETE 
				FROM props
				WHERE prop_id = ?";
				
		$data = array('prop_id' => $this->input->post('prop_id'));
		
		$this->db->query($sql, $data);
	}
}