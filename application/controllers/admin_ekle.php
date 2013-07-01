<?php

class Register extends CI_Controller
{
    public function index()
    {
		 if (!$this->is_logged_in()) 
		 {
		 		$this->load->model('alumni_model');
        		$data['main_content'] = 'admin_ekle';
        		if(isset($_GET['message'])) {
        			$data['message'] = $_GET['message'];
        		} else {
        			$data['message'] = 0;
        		}
        		$data['faculty'] = $this->alumni_model->get_faculty();
      			$this->load->view('template', $data);
         } 
    }
    private function is_logged_in()
    {
        return $this->session->userdata('logged_in');
    }
    public function validate() 
    {
		if($_POST['password'] == $_POST['passwordagain']) {
			return true;
		}
		return false;
	}
	public function get_department_name()
    {
    	$this->load->model('alumni_model');
    	$query = $this->alumni_model->get_department($_GET["id"]);
    	echo json_encode($query);
    }
    function create_admin()
	{
		$this->load->model('admin_model');
		if($this->validate())
		{
			$newdata = array(
                    'username'  => $_POST['name'],
                    'logged_in' => TRUE
               		);
					$this->session->set_userdata($newdata);
					redirect('home/admin_ekle');
		}
	}
?>
