<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 function upload_file_data($file_name,$file_path)
{
	 $ci=& get_instance();
	if($_FILES[$file_name]['name'] != '')
	{
		$a = time();
		$config['upload_path']   =   $file_path;
		$config['allowed_types'] =   "gif|jpg|jpeg|png|bmp|docx|pdf|txt";
		$config['max_size']      =   "5000";
		$config['max_width']     =   "5000";
		$config['max_height']    =   "5000";
		$config['file_name'] = $a.$_FILES[$file_name]['name'];
		$ci->load->library('upload',$config);
		$ci->upload->initialize($config);
		$ci->upload->do_upload($file_name);
		return $ci->upload->data();
	}
	else{
		return $ci->upload->display_errors();
	}
}
function pre($var)
  {
    echo '<pre>';
    if(is_array($var)) {
      print_r($var);
    } else {
      var_dump($var);
    }
    echo '</pre>';
  }
?>