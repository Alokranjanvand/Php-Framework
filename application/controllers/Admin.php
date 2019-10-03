<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_controller {

   public function index(){
		$this->load->view('admin/dashboard');
   }
   public function deleteData(){

      $ids = $this->input->post('ids');
      if(!empty($ids)){
                // Delete records from the database
               $delete = $this->Users_model->delete($ids); 
                // If delete is successful
                if($delete==1){
                    
                    $this->session->set_flashdata('statusMsg','Selected users have been deleted successfully.');
                }else{
                    $this->session->set_flashdata('error_Msg','Some problem occurred, please try again.');
                }
            }else{
				$this->session->set_flashdata('error_Msg','Select at least 1 record to delete.');
            }
       redirect('admin/view', $data);
   }
		public function add(){
			$this->form_validation->set_rules('name','User Name','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			if($this->form_validation->run()){
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			error_log("message".print_r($this->input->post(),true));
			$this->load->helper('file_upload');
			if(!empty($_FILES['picture']['name'])){
				$a='uploads/';
                $pic_file=upload_file_data('picture',$a);
                if($pic_file){
                    $picture = $pic_file['file_name'];
                }else{
                    $picture = '';
                }
            }
			if(!empty($_FILES['gallery']['name'])){
				
				
				$file_path='uploads/gallery/';
				$file_name='gallery';
				$upload_file_data=upload_file_data($file_name,$file_path);
                if($upload_file_data){
                	$gallery = $upload_file_data['file_name'];
                }else{
                    $gallery = '';
                }
            }
			$data=array(
					"name" 		  => $name,
					"email" 	  => $email,
					"password"	  => $password,
					"user_image"  => $picture,
					"gallery"  	  => $gallery
				);
			//error_log("message=== ".print_r($data,true));
			$insert=$this->Users_model->Insertdata($data);
			if($insert){
				 $this->session->set_flashdata('insertdata','Inserted users successfully.');
				redirect('admin/view');

			}

			}else{
				$this->load->view('admin/add');

			}
	
		}
		public function editUser($id){
 			$user=$this->Users_model->find_user($id);
 			$this->load->view('admin/edit_user',['user'=>$user]);
		}
		public function UpdateUser($id){
			$this->form_validation->set_rules('name','User Name','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			 $user=$this->Users_model->find_user($id);
			 $img=$user->user_image;
			 $gallery=$user->gallery;
			if($this->form_validation->run()){
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->load->helper('file_upload');
			//$a=pre($this->input->post());
			if($_FILES['picture']['size']>0 && $_FILES['picture']['error']==''){
				@unlink("uploads/".$img);
                $a='uploads/';
                $pic_file=upload_file_data('picture',$a);
                if($pic_file){
                    $picture = $pic_file['file_name'];
                }else{
                    $picture = '';
                }
	           
	    		
            }else{
            	$picture = $img;
            }
			if($_FILES['gallery']['size']>0 && $_FILES['gallery']['error']==''){
				@unlink("uploads/gallery/".$gallery);
                $b='uploads/gallery/';
                $gal_file=upload_file_data('gallery',$b);
                if($gal_file){
                    $gal_pic = $gal_file['file_name'];
                }else{
                    $gal_pic = '';
                }
	           
	    		
            }else{
            	$gal_pic = $gallery;
            }
			
			$data=array(
					"name" 		  => $name,
					"email" 	  => $email,
					"password"	  => $password,
					"user_image"  => $picture,
					"gallery"  => $gal_pic
					
				);
			//error_log("message=== ".print_r($data,true));
			$update=$this->Users_model->update_user($id,$data);
			if($update){
				 $this->session->set_flashdata('insertdata','Updated  users successfully.');
				redirect('admin/view');

			}

			}else{
				$this->load->view('admin/add');

			}
	
		}
		public function view(){
		$base_url = base_url() . "admin/view";
		$config=$this->pagination_f($base_url);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //error_log("message".$page);
        $data["links"] = $this->pagination->create_links();
        $data['authors'] = $this->Users_model->get_authors($config["per_page"], $page);
        $this->load->view('admin/viewdata', $data);
		}
		public function changepassword(){
			$login_id=$this->session->userdata('id');
			$this->load->model('Users_model');
			$data['data']=$this->Users_model->find_admin($login_id);
			$this->load->view('admin/change_password',$data);
			
		}
		
	public function pagination_f($base_url){
		$config = array();
		// $config["base_url"] = base_url() . "admin/view";
		$config["base_url"] = $base_url;
		$config["total_rows"] = $this->Users_model->get_count();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		return $config;
	}

		
		
		
	
    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

    /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials()
	{	

		$this->form_validation->set_rules('user_name','User Name','required|alpha');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()){
			echo"Suceessfull";

		}else{
			echo validation_errors();

		}

// 		 
	}	

    /**
    * The method just loads the signup view
    * @return void
    */
	function signup()
	{
		$this->load->view('admin/signup_form');	
	}
	

    /**
    * Create new user and store it in the database
    * @return void
    */	
	
	/**
    * Destroy the session, and logout the user.
    * @return void
    */		
  public function __construct()
 	{
   parent::__construct();
   if( ! $this->session->userdata('id')){
    	//return $this->load->view('admin/login');
    	return redirect('login');
	}
  }

   
    
 // }
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
