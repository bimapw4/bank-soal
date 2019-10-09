<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class question extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('QuestionModels','question');
    }
    public function index()
    {
        $data['GetQuestion']=$this->question->GetQuestion();
        $data['GetGrade']=$this->question->GetGrade();
        $data["konten"] = "picture";
        $this->load->view('home', $data);
    }
    public function Grade($id)
    {
        $data['GetQuestionId']=$this->question->GetQuestionId($id);
        $data['GetGrade']=$this->question->GetGrade();
        $data["konten"] = "GradePicture";
        $this->load->view('home', $data);
    }
    public function PostGrade()
    {
        $this->question->PostGrade();
        redirect('question','refresh');	
    }
    public function PostPicture()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        if($_FILES['gambar']['name']!=""){
            $this->load->library('upload', $config);
        
            if ( ! $this->upload->do_upload('gambar')){
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
            }
            else{
                if($this->question->PostQuestion($this->upload->data('file_name'))){
                    $this->session->set_flashdata('pesan', 'sukses menambah');	
                } else {
                    $this->session->set_flashdata('pesan', 'gagal menambah');	
                }
                redirect('question','refresh');		
            }
        } else {
            if($this->question->PostQuestion('')){
                $this->session->set_flashdata('pesan', 'sukses menambah');	
            } else {
                $this->session->set_flashdata('pesan', 'gagal menambah');	
            }
            redirect('question','refresh');	
        }
    }
}

/* End of file Controllername.php */
