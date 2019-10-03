<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load user model
        $this->load->model('user');
    }
    
    public function index(){
        $data = array();
        
        // If record delete request is submitted
        if($this->input->post('bulk_delete_submit')){
            // Get all selected IDs
            $ids = $this->input->post('checked_id');
            
             // If id array is not empty
            if(!empty($ids)){
                // Delete records from the database
                $delete = $this->user->delete($ids);
                
                // If delete is successful
                if($delete){
                    $data['statusMsg'] = 'Selected users have been deleted successfully.';
                }else{
                    $data['statusMsg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $data['statusMsg'] = 'Select at least 1 record to delete.';
            }
        }
        
        // Get user data from the database
        $data['users'] = $this->user->getRows();
        
        // Pass the data to view
        $this->load->view('admin/view_user_data', $data);
    }
    
}