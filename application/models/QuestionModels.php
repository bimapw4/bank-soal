<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionModels extends CI_Model {

    public function GetGrade()
    {
        return $this->db->get('grade')->result();
    }
    public function GetQuestionID($id)
    {
        return $this->db->where('GradeID',$id)
					  ->get('question')
					  ->result();
    }
    public function GetQuestion()
    {
        return $this->db->get('question')->result();
    }
    public function PostGrade()
    {
        $object=array(
            'title'=>$this->input->post('grade'),
        );
        
        return $this->db->insert('grade', $object);
    }
    public function PostQuestion($nama_file)
    {
        $object=array(
            'title'=>$this->input->post('title'),
            'GradeID' => $this->input->post('grade'),
            'picture'=>$nama_file
        );
        
        return $this->db->insert('question', $object);
    }

}

/* End of file QuestionModels.php */
