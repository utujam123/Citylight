<?php 
/*********************************/
//File name: controller_administrator.php
//Authror : Nico R. Penaredondo
//Description :  controller for the backend of the website for administrator
//Change Log  : 
//12/21/12 : Date Created
/*********************************/
class Controller_administrator extends Ci_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_credentials();
		$this->load->model('model_administrator');
	}
	private function check_credentials()
	{
		
		if($this->session->userdata('logged_in') == TRUE)
		{
			if($this->session->userdata('account_type') == 'user')
			{
				redirect('user/admin');
			}
			
		}else{
			redirect('auth/');
		}
	}
	
	public function index()
	{
		$view_data['recent_job_order'] = $this->model_administrator->get_recent_job_order();
		$view_data['list_job_order'] = $this->model_administrator->get_list_job_order();
		$view_data['list_of_accounts'] = $this->model_administrator->get_list_of_accounts();
		$this->load->view('user/admin/index',$view_data);	
	}
	public function edit_profile()
	{

	}
	public function branch_accounts()
	{

	}


	
	public function job_orders($slug = FALSE)
	{

	}




	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}

?>