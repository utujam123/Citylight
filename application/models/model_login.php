<?php
/*********************************/
//File name: model_login.php
//Authror : Nico R. Penaredondo
//Description :  model for the login of the website
//Change Log  : 
//12/21/12 : Date Created
/*********************************/
class Model_login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verify()
	{
		//filtering the username and password
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		//preparing the query
		//i'm using the AR class of the code igniter see the documentation for 
		//more information
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		//running the query
		$query = $this->db->get('user_accounts');
		//checking if there's an account
		if($query->num_rows() == 1)
		{
			//if there's a user. save its data into a session data
			$row = $query->row();
			$data = array(
				'id' => $row->id,
				'logged_in' => TRUE,
				'account_type' => $row->account_type
				);
			$this->session->set_userdata($data);
			return true;
		}
		//if previous process did not validate return FALSE
		return false;
	}

	public function ajax_verify($username,$password)
	{
		//$query = "SELECT * FROM user_accounts WHERE username = ? and password = ?";
 		//$this->db->query($query,array($username,$password));
  		$this->db->where('username',$username);
		$this->db->where('password',$password);
		//running the query
		$query = $this->db->get('user_accounts');
		//checking if there's an account
		if($query->num_rows() == 1)
		{
			//if there's a user. save its data into a session data
			$row = $query->row();
			$data = array(
				'id' => $row->id,
				'logged_in' => TRUE,
				'account_type' => $row->account_type
				);
			$this->session->set_userdata($data);
			return true;
		}
		//if previous process did not validate return FALSE
		return false;
	}

}
?>