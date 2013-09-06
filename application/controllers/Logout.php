<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index()
	{
		session_start();
		if(isset($_SESSION['id']))
			unset($_SESSION['id']);
		echo "Redirecting..<script type='text/javascript'>window.open('/','_self');</script>";
	}
}