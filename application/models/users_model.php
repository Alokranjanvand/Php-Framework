<?php

class Users_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
    public function __construct() {
        parent::__construct();
    }
	function validate($user_name, $password)
	{


		//$q = $this->db->query("select * from tb_adminusers where user_id='$user_name' and password='$password'");
	$q =$this->db->where(['user_id'=>$user_name,'password'=>$password])
->get('tb_adminusers');
//print_r($q);
		if($q->num_rows()){

			//echo "true";
		return $q->row();
			//return true;
		}else{
			return false;
		}		
	}

    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}
	
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	function create_member()
	{

		$this->db->where('user_name', $this->input->post('username'));
		$query = $this->db->get('membership');

        if($query->num_rows > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		}else{

			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
				'user_name' => $this->input->post('username'),
				'pass_word' => md5($this->input->post('password'))						
			);
			$insert = $this->db->insert('membership', $new_member_insert_data);
		    return $insert;
		}
	      
	}//create_member
	public function Insertdata($data)
    {
       $response= $this->db->insert(T_USER,$data);
		//$response=array('status' => 201,'message' => 'Data has been created.');
        return $response;
    }
    public function viewdata()
    {
   $result = $this->db->get(T_USER)->result_array(); 
		return $result;
    }
     public function get_count() {
        return $this->db->count_all(T_USER);
    }

    public function get_authors($limit, $start) {
       
        $match = $this->input->post('search');
        
   		$q=$this->db->select('')
            ->from(T_USER)
			->like('name',$match)
            ->limit($limit,$start)
            ->get();


        return $q->result();
    }
      // Delete record
   public function deleteUser($user_ids = array() ){


      foreach($user_ids as $userid){
         $this->db->delete(T_USER, array('id' => $userid));
      }

      return 1;
   }
   public function delete($ids){ 
   	
    $data=$this->db->select('user_image')->where_in('id', $ids)->get('user');
    $arr=$data->result_array();
    foreach ($arr as $result) {
    	$img=$result['user_image'];
    	@unlink("uploads/".$img);
    }
    $delete = $this->db->where_in('id', $ids)->delete('user');
    error_log("delete query".print_r($ids,true));
    if($delete)
    return 1;
else
	return 0;
      
    } 
     public function find_user($user_id)
  	{
  	 $q=$this->db->where('id',$user_id)
            ->get('user');
            return $q->row();


	}
	 public function find_admin($user_id)
  	{
  	 $q=$this->db->where('id',$user_id)
            ->get('tb_adminusers');
            return $q->row();


	}
   public function update_user($user_id,Array $data)
  {
   return $this->db->where('id',$user_id)
                   ->update(T_USER,$data);
  }
}

