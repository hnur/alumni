<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumni_model extends CI_Model 
{
	public function is_user($email, $password)
	{
		$query = $this->db->get_where('users', array('email' => $email, 'password' => $password, 'active' => '1'));
		return ($query->num_rows == 1) ? TRUE : FALSE;
	}
	public function get_username($email, $password)
	{
		$row = $this->db->get_where('users', array('email' => $email, 'password' => $password))->row();
		return $row->first_name;
	}
	public function get_user_info($user_id)
	{
		$row = $this->db->get_where('users', array('id' => $user_id))->row();
		return $row;
	}
	public function get_ilan_info($ilan_id) {
		$row = $this->db->get_where('event', array('id' => $ilan_id))->row();
		return $row;
	}
	public function set_user_info($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
	}
	public function get_department_info($department_id)
	{
		$row = $this->db->get_where('department', array('id' => $department_id))->row();
		return $row;
	}
	public function get_faculty_info($faculty_id)
	{
		$row = $this->db->get_where('faculty', array('id' => $faculty_id))->row();
		return $row;
	}
	public function get_uid($email)
	{
		$row = $this->db->get_where('users', array('email' => $email))->row();
		return $row->id;
	}
	public function get_user_type($email)
	{
		$row = $this->db->get_where('users', array('email' => $email))-> row();
		return $row->user_type;
	}
	public function get_job()
	{
		$rows = $this->db->get_where('event', array('event_type' => 'job'))->result_array();
		return $rows;
	}
	public function get_notice()
	{
		$this->db->order_by("publish_date", "desc");
		$this->db->limit(6,0);
		$rows = $this->db->get_where('event', array('event_type' => 'notice'))->result_array();
		return $rows;
	}
	public function validate_password($id, $password)
	{
		$query = $this->db->get_where('users', array('id' => $uid, 'password' => md5($password)));
		return ($query->num_rows == 1) ? TRUE : FALSE;
	}
	
	public function update_password($id, $password)
	{
		$this->db->update('users', array('password' => md5($password)), array('id' => $uid));
	}

	public function get_users()
	{
		$users = $this->db->order_by('id')->get('users')->result_array();
	 	return $users;
	}

	public function get_users_department($department_id)
	{
		$users = $this->db->order_by('id')->where('department_id',$department_id)->get('users')->result_array();
	 	return $users;
	}
	
	public function add_user($email, $password)
	{
		$query = $this->db->get_where('users', array('email' => $email));
		if($query->num_rows == 1){
			return FALSE;
		}
		$this->db->insert('users', array('email' => $email, 'password' => md5($password))); 
		return TRUE;
	}
	
	public function delete_user($id)
	{
		$this->db->delete('event', array('users_id' => $id));
		$this->db->delete('users', array('id' => $id));
	}

	public function delete_admin_user($id)
	{
		$this->db->delete('admin', array('id' => $id));
	}

	public function onayla_user($id)
	{
		$data = array(
               'active' => 1,
            );

		$this->db->where('id', $id);
		$this->db->update('users', $data); 
	}
	
	public function update_user($email, $password)
	{
		$this->db->update('users', array('password' => md5($password)), array('email' => $email));
	}
	function add_generic_sql($table_name, $data) {
		$insert = $this->db->insert($table_name,$data);//insert işlemi gerçekleştiriyoruz.
		return $insert;//true veya false değeri dönüyor
	}
	function create_member()
	{
		//database e eklenecek değerleri belirliyoruz.
		if($this->input->post('user_type') != 2) {
			$new_member_insert_data = array(
				'first_name' => $this->input->post('name'),
				'last_name' => $this->input->post('surname'),
				'email' => $this->input->post('email'),
				'department_id' => $this->input->post('bolum'),
				'user_type' => $this->input->post('user_type'),
				'user_type_no' => $this->input->post('studentno'),
				'joining_date' => $this->input->post('baslamadate'),
				'graduated_date' => $this->input->post('mezuniyetdate'),
				'register_date' => $this->input->post('mezuniyetdate'),
				'active' => '0',
				'password' => $this->input->post('password'));
		} else {
			$new_member_insert_data = array(
				'first_name' => $this->input->post('name'),
				'last_name' => $this->input->post('surname'),
				'email' => $this->input->post('email'),
				'department_id' => $this->input->post('bolum'),
				'user_type' => $this->input->post('user_type'),
				'user_type_no' => $this->input->post('studentno'),
				'active' => '1',
				'password' => $this->input->post('password'));
		}
		$this->db->insert('users',$new_member_insert_data);//insert işlemi gerçekleştiriyoruz.
		$row = $this->db->get_where('users', array('email' => $this->input->post('email')))->row();
		return $row->id;//eklenen kullanicinin id 'si
	}
	function create_admin()
	{
		$new_member_insert_data = array(
			'first_name' => $this->input->post('name'),
			'last_name' => $this->input->post('surname'),
			'email' => $this->input->post('email'),
			'bolum_id' => $this->input->post('bolum'),
			'fakulte_id' => $this->input->post('fakulte'),
			'admin_type' => '2',
			'password' => $this->input->post('password'));

		$this->db->insert('admin',$new_member_insert_data);//insert işlemi gerçekleştiriyoruz.
	}
	function get_faculty()
	{
		$faculty = $this->db->order_by('id')->get('faculty')->result_array();
	 	return $faculty;
	}

	function get_departments()
	{
		$faculty = $this->db->order_by('id')->get('department')->result_array();
	 	return $faculty;
	}

	function get_user_identifier()
	{
		$user_type = $this->db->order_by('id_user')->get('user_type')->result_array();
	 	return $user_type;
	}

	function get_department($id)
	{
		$row = $this->db->get_where('department', array('faculty_id' => $id))->result();
		return $row;
	}	
}
/* End of file alumni_model.php */
?>
