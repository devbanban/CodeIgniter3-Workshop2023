<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Question_model extends CI_Model {


        public function getAllQuestion()
        {
                $query = $this->db->get('tbl_question');
                return $query->result();
        }

        public function getAllQuestion1()
        {
                $this->db->where('group_question', 1);
                $query = $this->db->get('tbl_question');
                return $query->result();
        }

        public function getAllQuestion2()
        {
                $this->db->where('group_question', 2);
                $rs = $this->db->get('tbl_question');
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function insert_question()
        {
                $data = array(
                        'name_question' => $this->input->post('name_question'),
                        'group_question' => $this->input->post('group_question')
                );
                $this->db->insert('tbl_question', $data);
                        if($this->db->affected_rows() > 0){
                                return true;
                       }else{
                                return false;
                       }
        }


        public function delData($id)
        {
                $this->db->delete('tbl_question', array('id_question' => $id));
        }

        public function questionDetail($id)
        {
                $this->db->select('*');
	        $this->db->from('tbl_question');
                $this->db->where('id_question',$id);
                $rs = $this->db->get();
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function update_question($id)
        {
                $data = array(
                        'name_question' => $this->input->post('name_question')
                   );
   
                   $this->db->where('id_question',$id);
                   $this->db->update('tbl_question', $data);
                   if($this->db->affected_rows() > 0){
                       return true;
                      }else{
                       return false;
                      }
        }


}