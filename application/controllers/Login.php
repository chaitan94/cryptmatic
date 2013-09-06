<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function process()
	{
        $this->load->model('login_model');
        $this->login_model->validate();
        header('Location: /register');
	}
	public function get()
	{
		echo $this->session->userdata('email');
		echo $this->session->userdata('id');
		echo $this->session->userdata('name');
	}
}