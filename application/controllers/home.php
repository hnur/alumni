<?php if (!defined('BASEPATH')) die();
class Home extends Main_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

   	public function index()
	{
	  $data['main_content'] = 'index';
	  $data['notice'] = $this->alumni_model->get_notice();
      $this->load->view('template', $data);
	}
	
	public function hakkimizda()
	{
	  $data['main_content'] = 'hakkimizda';
	  $this->set_session_data('hakkimizda');
      $this->load->view('template', $data);
	}
	
	public function iletisim()
	{
	  $data['main_content'] = 'iletisim';
	  $this->set_session_data('iletisim');
      $this->load->view('template', $data);
	}
	public function send_iletisim()
	{
	   
	  	$this->load->library('email');
		$this->email->from('posta@deryauzun.com.tr');
		$this->email->to('deduzun@gmail.com'); 
		$this->email->subject('Email Test');
		$this->email->message('isim:'.$_POST['isim'].', email:'.$_POST['email'].', konu:'.$_POST['konu'].',mesaj:'.$_POST['mesaj']);	

		$this->email->send();
	 	// echo $this->email->print_debugger();

	  $data['main_content'] = 'iletisim';
          $this->load->view('template', $data);
	}
	public function profile()
	{
		$this->load->model('alumni_model');
		$data['main_content'] = 'profile';
		$this->set_session_data('profile');
		$data['user_info'] = $this->alumni_model->get_user_info($this->session->userdata('id'));
		$data['department'] = $this->alumni_model->get_department_info($data['user_info']->department_id);
		$data['faculty'] = $this->alumni_model->get_faculty_info($data['department']->faculty_id);
		$this->load->view('template', $data);
	}
	public function profile_hoca()
	{
		$this->load->model('alumni_model');
		$data['main_content'] = 'profile_hoca';
		$this->set_session_data('profile');
		$data['user_info'] = $this->alumni_model->get_user_info($this->session->userdata('id'));
		$data['department'] = $this->alumni_model->get_department_info($data['user_info']->department_id);
		$data['faculty'] = $this->alumni_model->get_faculty_info($data['department']->faculty_id);
		$this->load->view('template', $data);
	}
	function user()
	{
		$data['main_content'] = 'genel_profile';
		$user_id = $_GET['userid'];
		$message = $_GET['message'];
		$data['user_info'] = $this->alumni_model->get_user_info($user_id);
		$data['department'] = $this->alumni_model->get_department_info($data['user_info']->department_id);
		$data['faculty'] = $this->alumni_model->get_faculty_info($data['department']->faculty_id);
		$data['message'] = $message;
		$this->load->view('template', $data);
		
	}
	public function mezun()
	{
		$this->load->model('alumni_model');
	  	$data['main_content'] = 'mezun';
	  	$this->set_session_data('mezun');
	  	$data['users'] = $this->alumni_model->get_users();
	  	$data['fakulteler'] = $this->alumni_model->get_faculty();
	  	$data['bolumler'] = $this->alumni_model->get_departments();
      	$this->load->view('template', $data);
	}
	
    public function event()
	{
	  $data['main_content'] = 'event';
      $this->load->view('template', $data);
    }

   	function do_upload()
	{
		//$config['upload_path'] = './assets/uploads/';
		$config['upload_path'] = './assets/profile_images/';
		// $config['allowed_types'] = 'gif|jpg|png';
		$config['allowed_types'] = 'png';
		$config['max_size']	= '10000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('pages/profile_error', $error);
		}
		else
		{
			$im = array('upload_data' => $this->upload->data());
			$im_path = $im['upload_data']['file_path'];
			rename($im['upload_data']['full_path'], $im_path . $this->session->userdata('id') . '.png');
			//$this->load->model('alumni_model');
			//$data = array('imagepath' => $im['upload_data']['file_name']);
			//$this->alumni_model->set_user_info($this->session->userdata('id'), $data);
			
			if($this->session->userdata('user_type') == 1){
				redirect('home/profile');
			}
			else{
				redirect('home/profile_hoca');
			}
		}
	}
	function change_email(){
		if(!empty($_POST['email'])) {
			$this->load->model('alumni_model');
			$data = array(
	           'email' => $_POST['email'],
	        );
			$this->alumni_model->set_user_info($this->session->userdata('id'), $data);
		}
		if($this->session->userdata('user_type') == 1){
			redirect('home/profile');
		}
		else{
			redirect('home/profile_hoca');
		}
	}
	function change_sifre(){
		if(!empty($_POST['sifre'])) {
			$this->load->model('alumni_model');
			$data = array(
	           'password' => $_POST['sifre'],
	        );
			$this->alumni_model->set_user_info($this->session->userdata('id'), $data);
		}
		if($this->session->userdata('user_type') == 1){
			redirect('home/profile');
		}
		else{
			redirect('home/profile_hoca');
		}
	}
	function change_start(){
		if(!empty($_POST['baslamadate'])) {
			$this->load->model('alumni_model');
			$data = array(
	           'joining_date' => $_POST['baslamadate'],
	        );
			$this->alumni_model->set_user_info($this->session->userdata('id'), $data);
		}
		redirect('home/profile');
	}
	function change_finish(){
		if(!empty($_POST['finishdate'])) {
			$this->load->model('alumni_model');
			$data = array(
	           'graduated_date' => $_POST['finishdate'],
	        );
			$this->alumni_model->set_user_info($this->session->userdata('id'), $data);
		}
		redirect('home/profile');
	}
	function add_event(){
		$this->load->model('alumni_model');
		$this->load->helper('date');

		$data = array(
           'event_type' => $_POST['event_type'],
           'subject' => $_POST['subject'],
           'content' => $_POST['content'],
           'users_id' => $this->session->userdata('id'),
           'publish_date' => unix_to_human(now(), TRUE, 'us'),
    	);
    	if($this->alumni_model->add_generic_sql("event", $data)) {
    		redirect('home/profile_hoca');
    	} else {
    		$error = "Kayıt Eklenirken Hata Oluştu";
    		$this->load->view('pages/profile_error', $error);
    	}
	}
	public function admin_ops()
	{
		$this->load->model('alumni_model');
		$data['users'] = $this->alumni_model->get_users_department($this->session->userdata('bolum_id'));
	    $data['main_content'] = 'admin_ops';
        $this->load->view('template', $data);
	}
	public function delete()
	{
		$this->load->model('alumni_model');
		$id = $_GET['userid'];
		$this->alumni_model->delete_user($id);
	    redirect('home/admin_ops');
	}
	public function onayla()
	{
		$this->load->model('alumni_model');
		$id = $_GET['userid'];
		$this->alumni_model->onayla_user($id);
	    redirect('home/admin_ops');
	}
	public function admin_ekle()
	{
	  $this->load->model('admin_model');
	  $this->load->model('alumni_model');

	  if(isset($_GET['message'])) {
    		$data['message'] = $_GET['message'];
       } else {
        	$data['message'] = 0;
	   }

	  $data['users'] = $this->alumni_model->get_users_department($this->session->userdata('bolum_id'));
	  $data['admin'] = $this->admin_model->get_admins();
	  $data['faculty'] = $this->alumni_model->get_faculty();
	  $data['main_content'] = 'admin_ekle';
      $this->load->view('template', $data);
	}

	public function ilan()
	{
		$this->load->model('alumni_model');
		$this->set_session_data('ilan');
	    $data['main_content'] = 'ilan';
	    
	    if(isset($_GET['message'])) {
    		$data['message'] = $_GET['message'];
       	} else {
        	$data['message'] = 0;
	   	}
	    
	    $data['job'] = $this->alumni_model->get_job();
        $this->load->view('template', $data);
	}
	public function set_session_data($page_name) {
		$newdata = array(
						'user_type' => $this->session->userdata('user_type'),
                    	'username'  => $this->session->userdata('username'),
                    	'logged_in' => $this->session->userdata('logged_in'),
                    	'id' => $this->session->userdata('id'),
                    	'page' => $page_name
               		);
		$this->session->set_userdata($newdata);
	}
	public function send_message() {
		$from_user_info = $this->alumni_model->get_user_info($_POST['fromuserid']);
		$to_user_info = $this->alumni_model->get_user_info($_POST['touserid']);

		$this->load->library('email');
		$this->email->from($from_user_info->email);
		$this->email->to($to_user_info->email); 
		$this->email->subject($_POST['subject']);
		$this->email->message('isim:'.$from_user_info->first_name.', email:'.$from_user_info->email.', konu:'.$_POST['subject'].',mesaj:'.$_POST['content']);	

		$this->email->send();

	    redirect('home/user?userid='.$_POST['touserid'].'&message=1');
	}

	public function validate() {
		if($_POST['password'] == $_POST['passwordagain']) {
			return true;
		}
		return false;
	}

	function create_admin()
	{
        $this->load->model('alumni_model');
		if($this->validate())
		{
			$this->alumni_model->create_admin();
			redirect('home/admin_ekle?message=2');
		}
		else
		{
			redirect('home/admin_ekle?message=1');
		}
	}

	function delete_admin()
	{
		$this->load->model('alumni_model');
		$this->alumni_model->delete_admin_user($_GET['userid']);
		redirect('home/admin_ekle');
	}

	function apply_ilan() {
		$this->load->model('alumni_model');
		$ilan_info = $this->alumni_model->get_ilan_info($_POST['ilan_id']);
		$to_user_info = $this->alumni_model->get_user_info($ilan_info->users_id);
		$from_user_info = $this->alumni_model->get_user_info($this->session->userdata('id'));

		$this->load->library('email');
		$this->email->from($from_user_info->email);
		$this->email->to($to_user_info->email); 
		$this->email->subject($from_user_info->first_name." kullanicisi #".$_POST['ilan_id']." numarali ilaniniza basvurdu.");
		$this->email->message('isim:'.$from_user_info->first_name.', email:'.$from_user_info->email.',mesaj: ilaniniza basvurmak istiyorum.');	

		$this->email->send();

		redirect('home/ilan?message=1');
	}
}
