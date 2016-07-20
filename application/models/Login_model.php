<?php

/**
 * Description of Login_model
 *
 * @author wildiney
 */
class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        }
    
    public function verificar($email,$senha){
        $this->db->select();
        $this->db->from('cadastros');
        $this->db->where("email",$email);
        $this->db->where("senha",$senha);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows()==1){
            return $query->result();
        } else {
            return false;
        }
    }

}