<?php

class Register extends CI_Controller
{
    public function index()
    {
		 if (!$this->is_logged_in()) 
		 {
		 		$this->load->model('alumni_model');
        		$data['main_content'] = 'register';
        		if(isset($_GET['message'])) {
        			$data['message'] = $_GET['message'];
        		} else {
        			$data['message'] = 0;
        		}
        		$data['faculty'] = $this->alumni_model->get_faculty();
        		$data['user_type'] = $this->alumni_model->get_user_identifier();
      			$this->load->view('template', $data);
         } 
    }
    
    private function is_logged_in()
    {
        return $this->session->userdata('logged_in');
    }
    public function get_department_name()
    {
    	$this->load->model('alumni_model');
    	$query = $this->alumni_model->get_department($_GET["id"]);
    	echo json_encode($query);
    }
    public function validate() {
		if($_POST['password'] == $_POST['passwordagain']) {
			return true;
		}
		return false;
	}
   	function create_member()
	{
		$this->load->model('alumni_model');
		if($this->validate())
		{
			if($user_id = $this->alumni_model->create_member()) {
				if($_POST['user_type'] == 2) {
					$newdata = array(
						'user_type' => '2',
                    	'username'  => $_POST['name'],
                    	'logged_in' => TRUE,
                    	'id' => $user_id
               		);
					$this->session->set_userdata($newdata);
					redirect('home/profile_hoca');
				} else {
					redirect('register?message=2');
				}
			} else {
				redirect('register?message=1');	
			}
		}
		else
		{
			redirect('register?message=1');
		}
	}
}

?>

