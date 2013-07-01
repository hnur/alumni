<?php 
 
class Chat extends CI_Controller {

	//Global variable  
    public $outputData;		//Holds the output data for each view
	public $loggedInUser;

	public function index1()
    {
		//Load the users model 
		$this->load->model('auth_model');
		$this->load->model('users_model');
		//Load the session library
		$this->load->library('session');	
		
		// Redirect if not logged
		$sessionUserID = $this->session->userdata('id');
		if(!$sessionUserID) 
			redirect('welcome');
		
		//Get all users
		$this->outputData['listOfUsers']	= $this->users_model->getUsers();
		
		
		//$userdata  = $this->session->all_userdata(); 
		//$this->outputData['session_dataa'] = $userdata;
						
						
		 $this->load->view('chat/userList',$this->outputData);
    }
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

