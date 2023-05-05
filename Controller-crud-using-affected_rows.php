<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

		public function __construct()
        {
                parent::__construct();
                $this->load->model('register_model');
        }

    public function index()
    {
    	$this->load->view('register_home');
    }

	public function add_admin()
	{
		$this->load->view('form_register_admin');
	}

	public function cheking_register_admin()
	{

		//print_r($_POST);
		//exit;

		$this->form_validation->set_rules('name', 'ชื่อผู้ใช้', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'รหัสผ่าน ขั้นต่ำ 3 ตัว',
        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);


		$this->form_validation->set_rules('username', 'บัญชีผู้ใช้', 'trim|required|min_length[3]|max_length[12]|is_unique[tbl_register.username]',
        array(
	        	'required' => 'บังคับกรอกข้อมูล',
	        	'min_length' => 'บัญชีผู้ใช้ ขั้นต่ำ 3 ตัว',
	        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
	        	'is_unique' =>'Username ซ้ำ กรุณากรอกใหม่'
			    )
			);


		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'รหัสผ่าน ขั้นต่ำ 3 ตัว',
        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);

		$this->form_validation->set_rules('passwordConfirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'matches' => 'รหัสผ่านไม่ตรงกัน'
			    )
			);

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('form_register');
                }
                else
                {
                	//ตรวจสอบการ insert data
                		$result = $this->register_model->insert_register_admin();
						if($result){
							//echo 'Register Successfully';
							redirect('register','refresh');
						}else{ //save_error
							//echo 'Update Wrong!!';
							redirect('register','refresh');
						}
                } //else
	} //public function add_db()


	public function add_teacher()
	{
		$this->load->view('form_register_teacher');
	}


	public function cheking_register_teacher()
	{
		$this->form_validation->set_rules('name', 'ชื่อผู้ใช้', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'รหัสผ่าน ขั้นต่ำ 3 ตัว',
        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);


		$this->form_validation->set_rules('username', 'บัญชีผู้ใช้', 'trim|required|min_length[3]|max_length[12]|is_unique[tbl_register.username]',
        array(
	        	'required' => 'บังคับกรอกข้อมูล',
	        	'min_length' => 'บัญชีผู้ใช้ ขั้นต่ำ 3 ตัว',
	        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
	        	'is_unique' =>'Username ซ้ำ กรุณากรอกใหม่'
			    )
			);


		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'รหัสผ่าน ขั้นต่ำ 3 ตัว',
        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);

		$this->form_validation->set_rules('passwordConfirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'matches' => 'รหัสผ่านไม่ตรงกัน'
			    )
			);

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('form_register_teacher');
                }
                else
                {
                	//ตรวจสอบการ insert data
                		$result = $this->register_model->insert_register_teacher();
						if($result){
							//echo 'Register Successfully';
							redirect('register','refresh');
						}else{ //save_error
							//echo 'Update Wrong!!';
							redirect('register','refresh');
						}
                } //else
	}

	public function add_std()
	{
		$this->load->view('form_register_std');
	}


	public function cheking_register_std()
	{
		$this->form_validation->set_rules('name', 'ชื่อผู้ใช้', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'รหัสผ่าน ขั้นต่ำ 3 ตัว',
        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);


		$this->form_validation->set_rules('username', 'บัญชีผู้ใช้', 'trim|required|min_length[3]|max_length[12]|is_unique[tbl_register.username]',
        array(
	        	'required' => 'บังคับกรอกข้อมูล',
	        	'min_length' => 'บัญชีผู้ใช้ ขั้นต่ำ 3 ตัว',
	        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
	        	'is_unique' =>'Username ซ้ำ กรุณากรอกใหม่'
			    )
			);


		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'รหัสผ่าน ขั้นต่ำ 3 ตัว',
        	'max_length' => 'สูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);

		$this->form_validation->set_rules('passwordConfirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'matches' => 'รหัสผ่านไม่ตรงกัน'
			    )
			);

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('form_register_std');
                }
                else
                {
                	//ตรวจสอบการ insert data
                		$result = $this->register_model->insert_register_std();
						if($result){
							//echo 'Register Successfully';
							redirect('register','refresh');
						}else{ //save_error
							//echo 'Update Wrong!!';
							redirect('register','refresh');
						}
                } //else
	}




	public function login()
	{
		$this->load->view('login_form');
	}

	public function checkLogin()
	{
		//print_r($_POST);
		//exit;


		$this->form_validation->set_rules('username', 'บัญชีผู้ใช้', 'trim|required|min_length[3]',
        array(
	        	'required' => 'บังคับกรอกข้อมูล',
	        	'min_length' => 'บัญชีผู้ใช้ ขั้นต่ำ 3 ตัว'
			    )
			);


		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|min_length[3]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'รหัสผ่าน ขั้นต่ำ 3 ตัว',
			    )
			);

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('login_form');
                }
                else
                {
                	//ตรวจสอบการ Login
                	//check username & password
                	$result = $this->register_model->fetch_user_login(
							$this->input->post('username'),
							sha1($this->input->post('password'))
					);


			        if(!empty($result)){ //ถ้า username & password ถูกต้อง
							//create session var & value
							$sess=array(
								'admin_id'    		=> $result->id,
								'admin_name'    	=> $result->name,
								'access_level'    	=> $result->access_level,
							);
			 
			 				//crate session
							$this->session->set_userdata($sess);

							// print_r($_SESSION);
							// exit();
							//admin status
							if($_SESSION['access_level'] =='admin'){
								redirect('admin','refresh');
							}else if($_SESSION['access_level'] =='teacher'){
								redirect('teacher','refresh');
							}else if($_SESSION['access_level'] =='std'){
								redirect('std','refresh');
							}else{
								$this->session->unset_userdata(array('admin_id','admin_name', 'access_level'));
								redirect('register', 'refresh');
							}
			 
                	} else{
                		echo 'Username Or Password Incollect !!';
                		//redirect('register', 'refresh');
                	}
			} //else form vali
		} //fun


public function logout()
	{
		unset(
	        $_SESSION['admin_id'],
	        $_SESSION['admin_name']
		);
		redirect('register','refresh');
	}

} //class
