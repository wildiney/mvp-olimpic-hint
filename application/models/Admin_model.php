<?php

/**
 * Description of Login_model
 *
 * @author wildiney
 */
class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        }
    
    public function verificar($email,$password){
        $this->db->select();
        $this->db->from('admin');
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows()==1){
            return $query->result();
        } else {
            return false;
        }
    }

}