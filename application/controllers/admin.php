<?php

class Admin extends CI_Controller
{
    public function index()
    {
        if (!$this->is_logged_in()) {
			$data['main_content'] = 'admin_login';
			$data['message'] = 0;
            $this->load->view('template', $data);
        } else {
            redirect('home/admin_ops');
        }
    }
    
    public function check_login()
    {           
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[40]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]|alpha_numeric');
        
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/login_failed');
            
        } 
        else 
        {
            $isadmin = $this->admin_model->is_admin($this->input->post('email'), $this->input->post('password'));
           
            if (count($isadmin) == 1)
            {
				$type = $this->admin_model->get_admin_type($this->input->post('email'));
                $data = array(
                    'is_logged_in' => FALSE,
                    'logged_in' => TRUE,
                    'is_admin' => TRUE,
                    'bolum_id' => $isadmin[0]['bolum_id'],
                    'username' => $isadmin[0]['first_name'],
                    'type' => $isadmin[0]['admin_type'],
                    'page' => 'panel'
                );
                $this->session->set_userdata($data);
                if($type == 1)
                {
					redirect('home/admin_ekle');
					
				}
				else
				{
					redirect('home/admin_ops');
				}
            } 
            else 
            {
                redirect('admin/login_failed');
            }
        }
    }
    
    public function login_failed()
    {
		 $data['main_content'] = 'admin_login';
         $data['message'] = 1;
         $this->load->view('template', $data);
    }
    
    public function logout()
    {
        $this->session->set_userdata(array('is_admin' => FALSE, 'logged_in' => FALSE));
        $data['main_content'] = 'login';
        $data['message'] = FALSE;
        $this->load->view('template', $data);
    }
    
    private function is_logged_in()
    {
        return $this->session->userdata('is_admin');
    }
	
}
?>
	
