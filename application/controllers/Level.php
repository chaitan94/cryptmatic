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
		$this->load->database();
		session_start();
		if(isset($_SESSION['id'])){
			$tq = $this->db->query('SELECT level FROM users WHERE id='.$_SESSION['id'].' LIMIT 1');
			$result = $tq->row_array();
			$level = $result['level'];
		}else{
    		header('Location: /');
    		die();
		}

		$mint = parseInt($method);
	    
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
	    }else if($method == 'asd'){
	    	header('Location: /level/2');
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