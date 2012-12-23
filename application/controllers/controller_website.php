<?php 
/*********************************/
//File name: controller_website.php
//Authror : Nico R. Penaredondo
//Description :  controller for the main website 
//Change Log  : 
//12/21/12 : Date Created
/*********************************/
class Controller_website extends Ci_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	
	public function index()
	{

		$this->load->view('site/index');
		$this->load->view('welcome_message');

	}
	public function some_page()
	{

	}

}

?>