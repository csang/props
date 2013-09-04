<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
class Props extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('protector');
		$this->load->model('props_model');
	}

	public function index()
	{
		$data['props_item'] = $this->props_model->get_props();
		$data['title'] = 'Props archive';
	
		$this->load->view('templates/header', $data);
		$this->load->view('props/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function delete()
	{	
		$this->props_model->delete_props();
		$this->load->helper('form');
		
		$data['needCorrectInfo'] = 0;		
		$data['users'] = $this->props_model->get_users();
		$data['props_item'] = $this->props_model->get_props();
	
		$this->load->view('templates/header');
		$this->load->view('props/search', $data);
		$this->load->view('props/view', $data);
		$this->load->view('templates/footer');
	}
	
	/*public function update_form()
	{	
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('why', 'Why', 'required');
		
		$data['staff'] = $this->props_model->get_staff();
		$data['props_item'] = $this->props_model->get_props();
		$data['props_selected'] = $this->props_model->get_props_selected();
	
		$this->load->view('templates/header');
		$this->load->view('props/admin_update', $data);
		$this->load->view('props/view', $data);
		$this->load->view('templates/footer');
	}*/
	
	/*public function update()
	{	
		$this->props_model->update_props();
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('why', 'Why', 'required');
		
		$data['staff'] = $this->props_model->get_staff();
		$data['props_item'] = $this->props_model->get_props();
	
		$this->load->view('templates/header');
		$this->load->view('props/create', $data);
		$this->load->view('props/view', $data);
		$this->load->view('templates/footer');
	}*/
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
				
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('why', 'Why', 'required');
		
		$staff['staff'] = $this->props_model->get_staff();
		
		if($this->form_validation->run() !== FALSE)
		{
			$staff_selected = $this->props_model->get_staff_selected();
						
			$_SESSION["staff_selected"] = $staff_selected->ar_no_escape[1][0]->user_id;
						
			$this->props_model->set_props();
			$data["prop_info"] = "";
			
		}
			$this->load->view('templates/header');	
			$this->load->view('props/create', $staff);
			$this->load->view('templates/footer');
		
	}
	
	public function search()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
				
		$this->form_validation->set_rules('search', 'Search', 'required');
				
		$this->load->view('templates/header');	
		
		$data['users'] = $this->props_model->get_users();
		$data['needCorrectInfo'] = 0;
		
		if($this->input->post('search') != ""){		
			$data['props_item'] = $this->props_model->search();
		}else{
			$data['props_item'] = $this->props_model->get_props();
		}
		
		$this->load->view('props/search', $data);
		$this->load->view('props/view', $data);
		
		$this->load->view('templates/footer');
	}
}