<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
		if(isset($this->session->userdata['id']))
			header('Location: /');
		else
			$this->load->view('register');
	}
	public function newAcc()
	{
        $this->load->model('register_model');
        $result = $this->register_model->validate();
        echo $result;
	}
}