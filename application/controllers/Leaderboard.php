<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leaderboard extends CI_Controller {
	public function index()
	{
		$this->load->model('User_model');
		$toppers = $this->User_model->get_leaderboard();
		$data['toppers'] = $toppers;
		$this->load->view('leaderboard',$data);
	}
}