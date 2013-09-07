<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Current_user_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function get_level(){
		$tq = $this->db->query('SELECT level FROM users WHERE id=? LIMIT 1',array($this->session->userdata['id']));
		$result = $tq->row();
		return $result->level;
    }

    public function next_level($lvl){
    	$q = $this->db->query('SELECT rank FROM users WHERE id=? LIMIT 1;',$this->session->userdata['id']);
		$result = $q->row();
		$oldRank = $result->rank;
    	$q = $this->db->query('SELECT rank FROM users WHERE level>=? ORDER BY rank DESC LIMIT 1;',$lvl);
		$result = $q->row();
		$newRank = $result->rank;
    	$this->db->query('UPDATE users SET level=?, rank=? WHERE id=?;',array($lvl,$newRank+1,$this->session->userdata['id']));
    	$this->db->query('UPDATE users SET rank=rank+1 WHERE rank<=? AND level<?;',array($oldRank,$lvl));
    }
}
?>