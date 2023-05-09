<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Personnel_model extends CI_Model {


        public function getAllPersonnel()
        {
                $this->db->select('tbl_personnel.*, tbl_prefix.prefix_name, tbl_position.position_name ');
                $this->db->join('tbl_prefix', 'tbl_prefix.prefix_id =tbl_personnel.ref_prefix_id');
                $this->db->join('tbl_position', 'tbl_position.position_id=tbl_personnel.ref_position_id');
                $this->db->from('tbl_personnel');
                $query = $this->db->get();
                return $query->result();
        }


        public function getAllPrefix()
        {
                $query = $this->db->get('tbl_prefix');
                return $query->result();
        }

        public function getAllPosition()
        {
                $query = $this->db->get('tbl_position');
                return $query->result();
        }        

        public function insert_personnel()
        {
                $data = array(
                        'ref_position_id' => $this->input->post('ref_position_id'),
                        'ref_prefix_id' => $this->input->post('ref_prefix_id'),
                        'username' => $this->input->post('username'),
                        'password' => sha1($this->input->post('password')),
                        'name' => $this->input->post('name'),
                        'lastname' => $this->input->post('lastname'),
                        'phone' => $this->input->post('phone'),
                        'personnel_level' => $this->input->post('personnel_level')
                 );
                $this->db->insert('tbl_personnel', $data);
                        if($this->db->affected_rows() > 0){
                                return true;
                       }else{
                                return false;
                       }
        }


        public function delData($id)
        {
                $this->db->delete('tbl_personnel', array('personnel_id' => $id));
        }

        public function detail($id)
        {
                $this->db->select('*');
                $this->db->join('tbl_prefix', 'tbl_prefix.prefix_id =tbl_personnel.ref_prefix_id');
                $this->db->join('tbl_position', 'tbl_position.position_id=tbl_personnel.ref_position_id');
                $this->db->from('tbl_personnel');
                $this->db->where('tbl_personnel.personnel_id',$id);
                $rs = $this->db->get();
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function update_personnel($personnel_id)
        {
                $data = array(
                        'ref_position_id' => $this->input->post('ref_position_id'),
                        'ref_prefix_id' => $this->input->post('ref_prefix_id'),
                        'name' => $this->input->post('name'),
                        'lastname' => $this->input->post('lastname'),
                        'phone' => $this->input->post('phone'),
                        'personnel_level' => $this->input->post('personnel_level')
                   );
   
                   $this->db->where('personnel_id',$personnel_id);
                   $this->db->update('tbl_personnel', $data);
                   if($this->db->affected_rows() > 0){
                       return true;
                      }else{
                       return false;
                      }
        }


}