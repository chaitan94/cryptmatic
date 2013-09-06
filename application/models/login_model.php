<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        $username = $this->security->xss_clean($this->input->post('logMail'));
        $password = $this->security->xss_clean($this->input->post('logPass'));
        
        $this->load->database();
        $this->db->where('email', $username);
        $this->db->where('pass', $password);
        
        $query = $this->db->get('users');
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                    'id' => $row->id,
                    'name' => $row->name,
                    'email' => $row->email,
                    'level' => $row->level,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
}
?>