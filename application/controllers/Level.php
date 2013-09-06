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
		if($this->session->userdata['id']){
			$tq = $this->db->query('SELECT level FROM users WHERE id=? LIMIT 1',array($this->session->userdata['id']));
			$result = $tq->row_array();
			$level = $result['level'];
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
	    
	    if ($method == parseInt($mint)){
	    	if($mint>$level){
	    		header('Location: /level/'.$level);
	    		die();
	    	}else if($mint<1){
	    		header('Location: /level/1');
	    		die();
	    	}else{
	    		$this->index($mint);
	    		if($mint<1)echo 'yes';else echo 'lol';
	    	}
	    }else if($key = array_search($method, $answers)){
	    	if($key==$level)
				$this->db->query('UPDATE users SET level=? WHERE id=?',array($key+1,$this->session->userdata['id']));
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