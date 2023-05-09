<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('personnel_model');
	}

	public function index()
	{
		$data['rs']=$this->personnel_model->getAllPersonnel();
        // echo '<pre>';
		// print_r($data);
        // exit;
		$this->load->view('template/header');
		$this->load->view('personnel_list', $data);
		$this->load->view('template/footer');
	}

	public function adding()
	{

        $data['rsPre']=$this->personnel_model->getAllPrefix();
        $data['rsPo']=$this->personnel_model->getAllPosition();

		$this->load->view('template/header');
		$this->load->view('personnel_form_add', $data);
		$this->load->view('template/footer');
		
	}

	public function addData()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;


		$this->form_validation->set_rules('personnel_level', 'สิทธิการใช้งาน', 'trim|required|min_length[1]',
		array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('ref_position_id', 'ไอดีตำแหน่ง', 'trim|required|min_length[1]',
		array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('ref_prefix_id', 'ไอดีคำนำหน้าชื่อ', 'trim|required|min_length[1]',
		array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]|is_unique[tbl_personnel.username]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว', 'is_unique' => 'Username นี้มีผู้ใช้แล้ว !!'));

		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว'));

		$this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 3 ตัว'));

		$this->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|min_length[3]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 3 ตัว'));

		$this->form_validation->set_rules('phone', 'เบอร์โทร.', 'trim|required|min_length[4]|max_length[10]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว','max_length' => 'กรอกข้อมูลเกิน 10 ตัว'));

		               if ($this->form_validation->run() == FALSE)
		                {
							$data['rsPre']=$this->personnel_model->getAllPrefix();
					        $data['rsPo']=$this->personnel_model->getAllPosition();
							$this->load->view('template/header');
							$this->load->view('personnel_form_add', $data);
							$this->load->view('template/footer');
		                }else{
							$result = $this->personnel_model->insert_personnel();
							if($result){
								$this->session->set_flashdata('save_success', TRUE);
					            redirect('personnel','refresh');
							}else{ //save_error
								$this->session->set_flashdata('save_error', TRUE);
					            redirect('personnel/adding','refresh');
							}
		                }  //}else{
	}

	public function delete($id)
	{
		$this->personnel_model->delData($id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('personnel','refresh');
	}

	public function edit($id)
	{
		//call function in model
		$data['rsedit']=$this->personnel_model->detail($id);
		// print_r($data);
		// exit();
		if($data['rsedit']->personnel_id == ''){
			redirect('personnel', 'refresh');
		}else{
			$data['rsPre']=$this->personnel_model->getAllPrefix();
        	$data['rsPo']=$this->personnel_model->getAllPosition();
			$this->load->view('template/header');
			$this->load->view('personnel_form_edit', $data);
			$this->load->view('template/footer');
		}
		
	}

	public function editData()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

 
		
		$this->form_validation->set_rules('personnel_level', 'สิทธิการใช้งาน', 'trim|required|min_length[1]',
		array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('ref_position_id', 'ไอดีตำแหน่ง', 'trim|required|min_length[1]',
		array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('ref_prefix_id', 'ไอดีคำนำหน้าชื่อ', 'trim|required|min_length[1]',
		array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 3 ตัว'));

		$this->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|min_length[3]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 3 ตัว'));

		$this->form_validation->set_rules('phone', 'เบอร์โทร.', 'trim|required|min_length[4]|max_length[10]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว','max_length' => 'กรอกข้อมูลเกิน 10 ตัว'));

		$this->form_validation->set_rules('personnel_id', 'personnel_id', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ1 ตัว'));

		               if ($this->form_validation->run() == FALSE)
		                {
							$data['rsedit']=$this->personnel_model->detail($this->input->post('personnel_id'));
							$data['rsPre']=$this->personnel_model->getAllPrefix();
				        	$data['rsPo']=$this->personnel_model->getAllPosition();
							$this->load->view('template/header');
							$this->load->view('personnel_form_edit', $data);
							$this->load->view('template/footer');
		                }else{
							$result = $this->personnel_model->update_personnel($this->input->post('personnel_id'));
							if($result){
								//echo 'ok';
								$this->session->set_flashdata('save_success', TRUE);
					            redirect('personnel','refresh');
							}else{ //save_error
								//echo 'error';
								$this->session->set_flashdata('save_error', TRUE);
					            redirect('personnel','refresh');
							}
		                }  //}else{
	}

}
