<?php
class Users_model extends CI_Model {
	 
	/**
	 * Constructor 
	 *
	 */
	 
	function __Construct()
    {
        parent::__Construct();
    }
	
	
	// --------------------------------------------------------------------
		
	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function getUsers($conditions=array(),$fields='')
	 {
	 	
		parent::__construct(); 
		
		
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
			
		$this->db->from('users');

		$this->db->order_by("users.id", "asc");

		
		if($fields!='')
				$this->db->select($fields);
		else 		
	 		$this->db->select('users.id,users.first_name,users.email,users.online');
		
		$result = $this->db->get();
		
		return $result;
		

      }//End of getUsers Function
	 
	 // --------------------------------------------------------------------
				
	/**
	 * Get getLoggedInUser
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	  function getLoggedInUser() 
	  {

	 	$user = '';

			$condition = array('users.id'=>$this->session->userdata('user_id'));
			$fields    = 'users.id,users.first_name,users.email,users.online';
			
			$query = $this->getUsers($condition,$fields);
			
			if($query->num_rows()>0)
			{
				$user = $query->row();				
			}
			
		return $user;
	 }//End of getDecryptedString Function
	 
	 
	 // --------------------------------------------------------------------
	  
	  
		
	/**
	 * Update users
	 *
	 * @access	private
	 * @param	array	an associative array of insert values
	 * @return	void
	 */
	 function updateUser($updateKey=array(),$updateData=array())
	 {
	    $this->db->update('users',$updateData,$updateKey);
		 
	 }//End of editGroup Function 
	 
	//-----------------------------------------------------------------------------------
	 
	 
	 	
	/**
	 * Set Style for the flash messages
	 *
	 * @access	public
	 * @param	string	the type of the flash message
	 * @param	string  flash message 
	 * @return	string	flash message with proper style
	 */
	 function flash_message($type,$message)
	 {
	 	switch($type)
		{
			case 'success':
					$data = '<div class="message"><div class="success">'.$message.'</div></div>';
					break;
			case 'error':
					$data = '<div class="message"><div class="error">'.$message.'</div></div>';
					break;		
		}
		return $data;
	 }//End of flash_message Function
	 
	  
}
