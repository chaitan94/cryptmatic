<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index()
	{
        $this->session->sess_destroy();
		echo "Redirecting..<script type='text/javascript'>window.open('/','_self');</script>";
	}
}