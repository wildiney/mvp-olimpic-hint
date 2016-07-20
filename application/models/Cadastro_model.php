<?php

/**
 * Description of Login_model
 *
 * @author wildiney
 */
class Cadastro_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        }
    
    public function listar($matricula){
        $this->db->select();
        $this->db->from('cadastros');
        $this->db->where("matricula",$matricula);
        $query = $this->db->get();
        
        if($query->num_rows()==1){
            return $query->result();
        } else {
            return false;
        }
    }
        
    public function gravar($data){
        $cadastro = $this->listar($data['matricula']);
        if(!$cadastro){
            $data['senha']=  sha1($data['senha']);
            if ($this->db->insert('cadastros', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

}