<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function get_leaderboard(){
        $arr = $this->db->query('SELECT name,level,rank FROM users ORDER BY rank;');
        return $arr->result();
    }
}
?>