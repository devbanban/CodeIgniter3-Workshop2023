<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_model extends CI_Model {


	public function deletedata($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_crud');
	}

	public function list()
	{
		$this->db->select('e.*, p.p_name');
		$this->db->from('tbl_position AS p');
		$this->db->join('tbl_emp AS e', 'e.ref_p_id=p.p_id');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function list_position()
	{
		$this->db->select('*');
		$this->db->from('tbl_position');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function insertdata()
	{
		$data = array(
	        'e_name' => $this->input->post('e_name'),
	        'e_email' => $this->input->post('e_email'),
	        'ref_p_id' => $this->input->post('p_id')
		);
		$this->db->insert('tbl_emp', $data);
	}

	public function read($e_id)
        {
               	$this->db->select('e.*, p.p_name');
				$this->db->from('tbl_position AS p');
				$this->db->join('tbl_emp AS e', 'e.ref_p_id=p.p_id');
                $this->db->where('e.e_id',$e_id);
                $rs = $this->db->get();
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }


        public function updatedata($e_id)
        {
        	$data = array(
		        'e_name' => $this->input->post('e_name'),
	        	'e_email' => $this->input->post('e_email'),
	        	'ref_p_id' => $this->input->post('p_id')
			);
			$this->db->where('e_id',$e_id);
			$this->db->update('tbl_emp', $data);
        }

        public function insertUpload()
        {
        	$data = array(
	        'name' => $this->input->post('name'),
	        'img' => $this->upload->data('file_name')
			);
			$this->db->insert('tbl_upload', $data);
        }

}
