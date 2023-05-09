<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('question_model');
	}

	public function index()
	{
		$data['rs']=$this->question_model->getAllQuestion();
        // echo '<pre>';
		// print_r($data);
        // exit;
		$this->load->view('template/header');
		$this->load->view('question_list',$data);
		$this->load->view('template/footer');
	}

	public function adding()
	{
		$this->load->view('template/header');
		$this->load->view('question_form_add');
		$this->load->view('template/footer');
		
	}

	public function addData()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		

		$this->form_validation->set_rules('group_question', 'รูปแบบคำถาม', 'trim|required|min_length[1]',
		array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('name_question', 'คำถาม', 'trim|required|min_length[5]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว'));

		               if ($this->form_validation->run() == FALSE)
		                {
							$this->load->view('template/header');
							$this->load->view('question_form_add');
							$this->load->view('template/footer');
		                }else{
							$result = $this->question_model->insert_question();
							if($result){
								$this->session->set_flashdata('save_success', TRUE);
					            redirect('question','refresh');
							}else{ //save_error
								$this->session->set_flashdata('save_error', TRUE);
					            redirect('question/adding','refresh');
							}
		                }  //}else{
	}

	public function delete($id)
	{
		$this->question_model->delData($id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('question','refresh');
	}

	public function edit($id)
	{
		//call function in model
		$data['rsedit']=$this->question_model->questionDetail($id);
		// print_r($data);
		// exit();
		if($data['rsedit']->id_question == ''){
			redirect('question', 'refresh');
		}else{
			$this->load->view('template/header');
			$this->load->view('question_form_edit', $data);
			$this->load->view('template/footer');
		}
		
	}

	public function editData()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		
		$this->form_validation->set_rules('id_question', 'id', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		$this->form_validation->set_rules('name_question', 'คำถาม', 'trim|required|min_length[5]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว'));

		               if ($this->form_validation->run() == FALSE)
		                {
							$data['rsedit']=$this->question_model->questionDetail($this->input->post('id_question'));
							$this->load->view('template/header');
							$this->load->view('question_form_edit', $data);
							$this->load->view('template/footer');
		                }else{
							$result = $this->question_model->update_question($this->input->post('id_question'));
							if($result){
								$this->session->set_flashdata('save_success', TRUE);
					            redirect('question','refresh');
							}else{ //save_error
								$this->session->set_flashdata('save_error', TRUE);
					            redirect('question/adding','refresh');
							}
		                }  //}else{
	}

}
