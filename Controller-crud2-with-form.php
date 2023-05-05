<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('emp_model');
        }


	public function index()
	{
		$data['result'] = $this->emp_model->list();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit();
		$this->load->view('emp_list', $data);
	}


	public function adding()
	{
		$data['rsposition'] = $this->emp_model->list_position();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit();
		$this->load->view('emp_form_add', $data);
	}

	public function save()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('p_id', 'p_id', 'trim|required|min_length[1]',
        	array(
        		'required' => 'name บังคับกรอกข้อมูล',
        		'min_length' => 'กรอกข้อมูลขั้นต่ำ 1 ตัวอักษร'
        	)
		);

		$this->form_validation->set_rules('e_name', 'name', 'trim|required|min_length[5]|max_length[100]',
        	array(
        		'required' => 'name บังคับกรอกข้อมูล',
        		'min_length' => 'กรอกข้อมูลขั้นต่ำ 5 ตัวอักษร',
        		'max_length' => 'กรอกข้อมูลได้ไม่เกิน 100 ตัวอักษร',
        	)
		);



		$this->form_validation->set_rules('e_email', 'email', 'trim|required|valid_email',
        	array(
        		'required' => 'email บังคับกรอกข้อมูล',
        		'valid_email' => 'กรอกข้อมูลรูปแบบของอีเมลให้ถูกต้อง',
        	)
		);
	
				if ($this->form_validation->run() == FALSE)
                {
                		$data['rsposition'] = $this->emp_model->list_position();
                        $this->load->view('emp_form_add', $data);
                }
                else
                {
                         $this->emp_model->insertdata();
                         redirect('emp','refresh');
                }

	} //save


	public function delete($id)
	{
		$this->emp_model->deletedata($id);
		redirect('crud2','refresh');
	}

	public function update($e_id)
	{
		$data['rsedit'] = $this->emp_model->read($e_id);
		$data['rsposition'] = $this->emp_model->list_position();

		// echo '<pre>';
		// print_r($data['rsposition']);
		// echo '</pre>';
		// exit();

		//echo $data['rsedit']->id;
		//exit();

		if($data['rsedit']->e_id =='') {
			redirect('emp','refresh');
		}
		
		$this->load->view('emp_form_edit', $data);
	}

	public function updatedata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('p_id', 'p_id', 'trim|required|min_length[1]',
        	array(
        		'required' => 'name บังคับกรอกข้อมูล',
        		'min_length' => 'กรอกข้อมูลขั้นต่ำ 1 ตัวอักษร'
        	)
		);

		$this->form_validation->set_rules('e_name', 'name', 'trim|required|min_length[5]|max_length[100]',
        	array(
        		'required' => 'name บังคับกรอกข้อมูล',
        		'min_length' => 'กรอกข้อมูลขั้นต่ำ 5 ตัวอักษร',
        		'max_length' => 'กรอกข้อมูลได้ไม่เกิน 100 ตัวอักษร',
        	)
		);



		$this->form_validation->set_rules('e_email', 'email', 'trim|required|valid_email',
        	array(
        		'required' => 'email บังคับกรอกข้อมูล',
        		'valid_email' => 'กรอกข้อมูลรูปแบบของอีเมลให้ถูกต้อง',
        	)
		);

		$this->form_validation->set_rules('e_id', 'e_id', 'trim|required|min_length[1]|max_length[10]',
        	array(
        		'required' => 'ไม่มีการส่งค่า id มา',
        		'min_length' => 'กรอกข้อมูลขั้นต่ำ 1 ตัวอักษร',
        		'max_length' => 'กรอกข้อมูลได้ไม่เกิน 10 ตัวอักษร',
        	)
		);
	
				if ($this->form_validation->run() == FALSE)
                {
                		$data['rsedit'] = $this->emp_model->read($this->input->post('e_id'));
						$data['rsposition'] = $this->emp_model->list_position();
                       	$this->load->view('emp_form_edit', $data);
                }
                else
                {
                         $this->emp_model->updatedata($this->input->post('e_id'));
                         redirect('emp','refresh');
                }
	}

}
