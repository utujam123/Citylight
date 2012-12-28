<?php
/*********************************/
//File name: controller_login.php
//Authror : Nico R. Penaredondo
//Description :  controller for the login in the website
//Change Log  : 
//12/21/12 : Date Created
//12/22/12 : completed the login 
/*********************************/
class Controller_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_login();
	}

	public function index($msg = NULL)
	{
		/*
		this will check if the user is still logged in
		*/
		
		$data['msg'] = $msg;
		$this->load->view('auth/index',$data);
	}

	private function check_login()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			if($this->session->userdata('account_type') == 'administrator')
			{
				redirect('user/admin');
			}
			elseif($this->session->userdata('account_type') == 'user')
			{
				redirect('user');
			}
		}
	}

	public function process()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/index');
		}else
		{
			$this->load->model('model_login');
			$check_login = $this->model_login->verify();
			if($check_login === TRUE)
			{
				if($this->session->userdata('account_type') == 'administrator')
				{
					redirect(base_url('user/admin'));
				}elseif ($this->session->userdata('account_type') == 'user')
				{
					redirect('user/');
				}else
				{
					redirect('auth');
				}
			}else
			{
			$msg = 'there\'s no such account';
			$this->index($msg);
			}
		}
	}
	
	public function ajax_process()
	{
			$this->load->model('model_login');
			/*
				things that will be passed to this function
				1. username
				2. password
			*/

			//the second parameter is used for XSS Filtering
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$check_login = $this->model_login->verify();
			if($check_login === TRUE)
			{
				if($this->session->userdata('account_type') == 'administrator')
				{
					redirect(base_url('user/admin'));
				}elseif ($this->session->userdata('account_type') == 'user')
				{
					redirect('user/');
				}else
				{
					redirect('auth');
				}
			}else
			{
			$msg = 'there\'s no such account';
			return $msg;
			}
	}


	

}
?>