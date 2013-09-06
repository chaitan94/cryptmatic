<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Level extends CI_Controller {
	public function _remap($method)
	{
	    if ($method != 'index')
	    {
	        echo $method;
	    }
	    else
	    {
	        $this->index();
	    }
	}
	public function index()
	{
		$this->load->view('level');
	}
}