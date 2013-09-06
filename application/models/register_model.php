<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        $name = $this->security->xss_clean($this->input->post('regName'));
        $email = $this->security->xss_clean($this->input->post('regMail'));
        $pass = $this->security->xss_clean($this->input->post('regPass'));
        $pass2 = $this->security->xss_clean($this->input->post('regPass2'));
        
        if($name&&$email&&$pass&&$pass2){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $pquery = $this->db->query("SELECT id FROM users WHERE email=?",array($email));
                if(!$pquery->num_rows){
                    if($pass==$pass2){
                        $query = $this->db->query("INSERT INTO users(name, pass, email, level) VALUES (?, ?, ?, 1)",array($name, $pass, $email));
                        $data = array(
                                'id' => $this->db->insert_id(),
                                'name' => $name,
                                'email' => $email,
                                'level' => 1,
                                'validated' => true
                                );
                        $this->session->set_userdata($data);
                        echo "Registration Successful.";
                    }else{
                        echo "Passwords don't match!";
                    }
                }else{
                    echo "Email already exists!";
                }
            }else{
                echo "Invalid Email.";
            }
        }else{
            echo "All details are neccessary.";
        }
    }
}
?>