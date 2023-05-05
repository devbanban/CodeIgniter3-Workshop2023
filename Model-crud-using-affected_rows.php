<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function insert_register_admin()
	{
		$data = array(
	        'name' => $this->input->post('name'),
	        'username' => $this->input->post('username'),
	        'password' => sha1($this->input->post('password')),
	        'access_level' => 'admin',
		);
		$this->db->insert('tbl_register', $data);
		//คล้ายใช้ if result == true
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}


	public function insert_register_teacher()
	{
		$data = array(
	        'name' => $this->input->post('name'),
	        'username' => $this->input->post('username'),
	        'password' => sha1($this->input->post('password')),
	        'access_level' => 'teacher',
		);
		$this->db->insert('tbl_register', $data);
		//คล้ายใช้ if result == true
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}


	public function insert_register_std()
	{
		$data = array(
	        'name' => $this->input->post('name'),
	        'username' => $this->input->post('username'),
	        'password' => sha1($this->input->post('password')),
	        'access_level' => 'std',
		);
		$this->db->insert('tbl_register', $data);
		//คล้ายใช้ if result == true
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}

	public function fetch_user_login($username, $password)
	{
                $this->db->where('username',$username);
                $this->db->where('password',$password);
                $rs = $this->db->get('tbl_register');
 				return $rs->row();
 	}



 	public function admin_detail($id)
        {
                $this->db->select('*');
                $this->db->from('tbl_register');
                $this->db->where('id',$id);
                $rs = $this->db->get();
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }


	 
}
