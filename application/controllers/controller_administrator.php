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
	}
	private function check_credentials()
	{
		if(!$this->session->userdata('logged_in') === TRUE && !$this->session->userdata('account_type') == 'administrator')
		{
			redirect('auth/');
		}
	}
	
	public function index()
	{
		$this->load->view('user/admin/index');	
	}
	public function edit_profile()
	{

	}
	public function branch_accounts()
	{

	}
	public function job_orders()
	{

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}

?>