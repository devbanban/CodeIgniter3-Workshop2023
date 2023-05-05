<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('c_model');
        }

	public function index()
	{
		 $this->c_model->insert();
	}

	public function updatedata()
	{
		 $this->c_model->update();
	}

	public function del()
	{
		 $this->c_model->delleteData();
	}

}
