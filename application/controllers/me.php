<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class me extends CI_Controller {

    public function admin()
    {
        if ($this->session->userdata('login')==TRUE) {
			redirect('question','refresh');
		} else {
			$this->load->view('login');
		}
    }
    public function proses_login()
	{
		if ($this->input->post('Login')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->load->model('AdminModels');

				if ($this->AdminModels->get_login()->num_rows()>0) {

					$data=$this->AdminModels->get_login()->row();

					$array = array(
						'login' => TRUE,
						'username' => $data->username,
						'password' => $data->password
					);

					$this->session->set_userdata( $array );
					redirect('question','refresh');

				}else{
					$this->session->set_flashdata('pesan', 'username dan password salah');
					redirect('me/admin','refresh');
				}
			} else {
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('me/admin','refresh');
			}

		}
	}
    public function logout()
	{
		$this->session->sess_destroy();
		redirect('question','refresh');
	}
}

/* End of file me.php */
