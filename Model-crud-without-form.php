<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_model extends CI_Model {

	public function insert()
	{
		$data = array(
	        'name' => 'พิศิษฐ์',
	        'phone' => '094861777'
		);
		$this->db->insert('tbl_crud', $data);
	}

	public function update()
	{
		$data = array(
	        'name' => 'พิศิษฐ์ dddd',
	        'phone' => '09487878787'
		);
		$this->db->where('id',2);
		$this->db->update('tbl_crud', $data);
	}

	public function deletedata($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_crud');
	}

	public function list()
	{
		$query = $this->db->get('tbl_crud'); 
		return $query->result();
	}

	public function insertdata()
	{
		$data = array(
	        'name' => $this->input->post('name'),
	        'phone' => $this->input->post('phone')
		);
		$this->db->insert('tbl_crud', $data);
	}

	public function read($id)
        {
                $this->db->select('*');
                $this->db->from('tbl_crud');
                $this->db->where('id',$id);
                $rs = $this->db->get();
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }


        public function updatedata($id)
        {
        	$data = array(
		        'name' => $this->input->post('name'),
	        	'phone' => $this->input->post('phone')
			);
			$this->db->where('id',$id);
			$this->db->update('tbl_crud', $data);
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
