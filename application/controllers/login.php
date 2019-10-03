<?php
class login extends MY_Controller
{
public function __construct()
  {
    parent::__construct();
    if( $this->session->userdata('id') )
    return redirect('admin/view');
    
  }

function index()
	{
		$this->form_validation->set_rules('user_name','User Name','required|alpha');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run()){
			$user_name=$this->input->post('user_name');
			$password=$this->input->post('password');
			$r=$this->Users_model->validate($user_name, $password);
			if($r){
				$login_id=$r->id;
				$user_id=$r->user_id;
				$this->session->set_userdata('id',$login_id);
				$this->session->set_userdata('user_name',$user_id);
				return redirect('admin/view');
			}else{
				$this->session->set_flashdata('Login_failed','Invalid Username/Password');
				return redirect('login');
			}
		}else{
		$this->load->view('admin/login');
		}
	}
	public function check(){
		$a=$this->input->get('name');
		echo $a;
	}

}