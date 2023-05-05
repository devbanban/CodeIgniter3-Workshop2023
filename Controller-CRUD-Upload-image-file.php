<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudUpload extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('crud_m');
        }


	public function index()
	{
		//call function in model
		 $data['query']=$this->crud_m->get_data();
		 $this->load->view('list_view3', $data);
		
	}

	public function add()
	{
		  $this->load->view('form_upload_view', array('error' => ' ' ));
	}

	public function add_db()
	{
		//print_r($_POST);

		$this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'กรอกข้อมูลขั้นต่ำ 3 ตัวอักษร',
        	'max_length' => 'กรอกข้อมูลสูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);


		$this->form_validation->set_rules('phone', 'เบอร์โทร', 'trim|required|min_length[10]|max_length[10]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'กรอกข้อมูลขั้นต่ำ 10 ตัวอักษร',
        	'max_length' => 'กรอกข้อมูลสูงสูดไม่เกิน 10 ตัวอักษร',
			    )
			);



		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('form_upload_view', array('error' => ' ' ));
                }
                else
                {

                // upload 
                $config['upload_path']          = './pic/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 400;
                $config['encrypt_name']			= TRUE;

                //upload img rule
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('form_upload_view', $error);
                }
                else
                {
                	//upload ได้ ไม่ผิดเงือ่นไข
                           //echo $this->upload->data('file_name');  // insert db
	                        $result = $this->crud_m->add_db_img();
								if($result){
									//echo 'Insert Successfully';
								redirect('crudUpload','refresh');
								}else{ //save_error
									echo 'error';
								//redirect('crud/list','refresh');
								}
                }

                // end upload 
                }
	}

	public function edit($id)
	{
		//call function in model
		 $data['rsedit']=$this->crud_m->memberDetail($id);
		// echo $data['rsedit']->id;
		// print_r($data);

		 //ถ้าคิวรี่ข้อมูลไม่ได้
		 if($data['rsedit']->id==''){
		 	redirect('crudUpload','refresh');
		 }
		 $this->load->view('form_upload_edit_view', $data);
	}

	public function edit_db_img()
	{
		// print_r($_POST);
		// exit();

		$this->form_validation->set_rules('id', 'id', 'required');


		$this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'กรอกข้อมูลขั้นต่ำ 3 ตัวอักษร',
        	'max_length' => 'กรอกข้อมูลสูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);


		$this->form_validation->set_rules('phone', 'เบอร์โทร', 'trim|required|min_length[10]|max_length[10]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'กรอกข้อมูลขั้นต่ำ 10 ตัวอักษร',
        	'max_length' => 'กรอกข้อมูลสูงสูดไม่เกิน 10 ตัวอักษร',
			    )
			);



		if ($this->form_validation->run() == FALSE)
                {
                		$data['rsedit']=$this->crud_m->memberDetail($this->input->post('id'));
                        $this->load->view('form_upload_edit_view', $data);
                }
                else
                {

                	//check upload file
                	///print_r($_FILES);
                	$filename = $_FILES['img']['name'];

                	//echo $filename;

                	//exit();

                	if ($filename!='') {
                		//upload new file & delete old pic
                		// upload 
			                $config['upload_path']          = './pic/';
			                $config['allowed_types']        = 'gif|jpg|png|jpeg'; //iphone image type = jpeg
			                $config['max_size']             = 300;
			                $config['encrypt_name']			= TRUE;

			                //upload img rule
			                $this->load->library('upload', $config);
			                if ( ! $this->upload->do_upload('img'))
			                {
			                        $data = array('error' => $this->upload->display_errors());
			                        //$this->load->view('form_upload_view', $error);
			                        $data['rsedit']=$this->crud_m->memberDetail($this->input->post('id'));
                        			$this->load->view('form_upload_edit_view', $data);
			                }else{
				                //upload ได้ ไม่ผิดเงือ่นไข
		                        	$result = $this->crud_m->edit_db_img($this->input->post('id'));
									if($result){
										unlink('pic/'.$this->input->post('img2'));
										//echo 'update Successfully';
										redirect('crudUpload','refresh');
									}else{ //save_error
										echo 'error';
									//redirect('crud/list','refresh');
									}

			                }
                	}else{
                		//use old image file

                		$result = $this->crud_m->edit_db_without_img($this->input->post('id'));
									if($result){
										//echo 'update Successfully';
										redirect('crudUpload','refresh');
									}else{ //save_error
										echo 'error';
									//redirect('crud/list','refresh');
									}


                	}

                }
	}

	
	public function del($id)
	{
		 $data['rsedit']=$this->crud_m->memberDetail($id);
		// echo $data['rsedit']->id;
		// print_r($data);

		// echo $data['rsedit']->img;

		// exit();

		 //ถ้าคิวรี่ข้อมูลไม่ได้
		 if($data['rsedit']->id==''){
		 	redirect('crudUpload','refresh');
		 }


		 $this->crud_m->del($id);
		 unlink('pic/'.$data['rsedit']->img);
		 redirect('CrudUpload','refresh');
		
	}
 
}
