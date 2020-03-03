<?php 
/**
 * 
 */
class User_model extends CI_model
{
	
	function create($formArray)
	{
		$this->db->insert('users',$formArray); //insert INTO users (name,email,etc.) values (?,?);
	} 

	function all()
	{
		return $users = $this->db->get('users')->result_array(); // select * from User
	}

	function getUser($id)
	{
		$this->db->where('id',$id);
		return $user = $this->db->get('users')->row_array(); // select * from users where id=?;
	}

	function updateUser($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('users',$formArray); // update users set name= ?,etc.;
	}

	function deleteUser($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('users'); // delete from users where id= ? ;
	}
}

?>