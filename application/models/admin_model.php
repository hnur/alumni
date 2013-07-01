<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
	public function is_admin($email, $password)
	{
		$query = $this->db->get_where('admin', array('email' => $email, 'password' => $password))->result_array();
		return $query;
	}
	public function delete_user($id)
	{
		$this->db->delete('users', array('id' => $id));
	}
	public function get_admin_type($email)
	{
		$row = $this->db->get_where('admin', array('email' => $email))-> row();
		return $row->admin_type;
	}
	public function get_admins()
	{
		$admins = $this->db->order_by('id')->get('admin')->result_array();
	 	return $admins;
	}
	public function create_admin()
	{
		$new_member_insert_data = array(
				'first_name' => $this->input->post('name'),
				'last_name' => $this->input->post('surname'),
				'email' => $this->input->post('email'),
				'department_id' => $this->input->post('bolum'),
				'password' => $this->input->post('password'));
				$this->db->insert('admin',$new_member_insert_data);//insert işlemi gerçekleştiriyoruz.
	}
}
?>
