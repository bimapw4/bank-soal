<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModels extends CI_Model {

    public function get_login()
	{
		return $this->db->where('username',$this->input->post('username'))
						->where('password',$this->input->post('password'))
						->get('admin');
	}

}

/* End of file AdminModels.php */
