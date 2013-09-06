<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
		$this->load->view('register');
	}
	public function newAcc()
	{
        $this->load->model('register_model');
        $result = $this->register_model->validate();
        echo $result;
	}
}