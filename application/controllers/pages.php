<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
class Pages extends CI_Controller {
	
	public function view($page = 'login')
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('props_model');
		
		$data['title'] = 'Login';
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		/*if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}*/
		
		if ($this->form_validation->run() === FALSE)
		{
			$_SESSION["logged_in"] = 0;
			session_destroy();
			$data['title'] = ucfirst($page); // Capitalize the first letter - From codeIgniter
			$data['props_item'] = $this->props_model->get_props();
			$data['needCorrectInfo'] = 2;
					
			$this->load->view('templates/login_header', $data);
			$this->load->view('pages/login');
			$this->load->view('props/view', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$this->load->model('login_model');
			$data = $this->login_model->login();
			
						
			if(isset($data->ar_no_escape[0][0]->user_id)){
				$_SESSION["logged_in"] = 1;
				$_SESSION["user_id"] = $data->ar_no_escape[0][0]->user_id;
				$_SESSION["user_type_id"] = $data->ar_no_escape[0][0]->user_type_id;
				
				$this->load->model('protector');
				
				$this->load->view('templates/header');
				
				if($_SESSION["user_type_id"] == 1){
					
					$props['needCorrectInfo'] = 1;
					$props['users'] = $this->props_model->get_users();
					$props['props_item'] = $this->props_model->get_props();
					
					$this->load->view('props/search', $props);
					$this->load->view('props/view', $props);
				}else{
					$this->load->view('pages/home', $data);	
				}
				
				$this->load->view('templates/footer');
				
			}else{
				$_SESSION["logged_in"] = 0;
				session_destroy();
				$this->load->view('templates/login_header', $data);
				$this->load->view('pages/login');
				$this->load->view('templates/footer', $data);	
			}
		}
	}
	
	public function home(){
		
		$this->load->model('protector');
		$this->load->view('templates/header');
		$this->load->view('pages/home');
		$this->load->view('templates/footer');
	}
}
?>