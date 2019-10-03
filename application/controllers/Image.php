<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package Image :  CodeIgniter Image Image with MySQL
 *
 * @author TechArise Team
 *
 * @email info@techarise.com
 *   
 * Description of Image Controller
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Upload_model', 'upl');
    }
    // upload image
    public function index() {
        $data['page'] = 'image-img';
        $data['title'] = 'Upload Image | TechArise';         
        $this->load->view('img/index', $data);
    }    
    // action save method
    public function save() {
        $path = ROOT_UPLOAD_PATH;
        // Define file rules
        $initialize = $this->upload->initialize(array(
            "upload_path" => $path,
            "allowed_types" => "gif|jpg|jpeg|png|bmp",
            "remove_spaces" => TRUE
        ));
        $imagename = 'no-img.jpg';
        if (!$this->upload->do_upload('imageURL')) {
            $error = array('error' => $this->upload->display_errors());
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
            $imagename = $data['file_name'];
            $this->upl->setURL($imagename);            
            $this->upl->create();                           
            $this->session->set_flashdata('img_uploaded_msg', '<div class="alert alert-success">Image uploaded successfully!</div>');
            $this->session->set_flashdata('img_uploaded', $imagename);
            redirect('/');
        }            
    }    
}