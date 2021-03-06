<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Level extends CI_Controller {
	public function _remap($method)
	{
		function parseInt($string) {
			if(preg_match('/(\d+)/', $string, $array)) {
				return $array[0];
			} else {
				return 0;
			}
		}

		$level=0;
		$this->load->model('Current_user_model');
		if($this->session->userdata['id']){
			$level = $this->Current_user_model->get_level();
		}else{
    		header('Location: /');
    		die();
		}

		$mint = parseInt($method);

		$answers = array(
			1 => 'ans1',
			2 => 'ans2',
			3 => 'ans3',
			4 => 'ans4',
			5 => 'ans5',
			6 => 'ans6',
			7 => 'ans7'
		);
	    
	    if ($method == $mint){ // integer given as method
	    	if($mint>$level){  // greater than current level
	    		header('Location: /level/'.$level);
	    		die();
	    	}else if($mint<1){ // less than lowest level
	    		header('Location: /level/1');
	    		die();
	    	}else{ // on current level
	    		$this->index($mint);
	    	}
	    }else if($key = array_search($method, $answers)){
	    	if($key==$level)
	    		$this->Current_user_model->next_level($key+1);
	    	header('Location: /level/'.($key+1));
	    	die();
	    }else if($method != parseInt($method)){
    		header('Location: /level/'.parseInt($method));
    		die();
	    }else{
    		header('Location: /level/'.$level);
    		die();
	    }
	}
	public function index($lvl)
	{
    	$data['lvl'] = $lvl;
		$this->load->view('level',$data);
	}
}