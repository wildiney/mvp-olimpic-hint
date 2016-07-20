<?php

/**
 * Description of Login_model
 *
 * @author wildiney
 */
class Questions_model extends CI_Model {
    function convertDate($data){
        $dataExploded = explode("/",$data);
        $newData = $dataExploded[2]."-".$dataExploded[1]."-".$dataExploded[0];
        return $newData;
    }
    public function __construct() {
        parent::__construct();
        }
    
    public function save($data){
        $data['valid_from'] = $this->convertDate($data['valid_from']);
        $data['valid_until'] = $this->convertDate($data['valid_until']);
        
        if ($this->db->insert('questions', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function listAll(){
        $this->db->order_by('idQuestion', "desc");
        $query = $this->db->get('questions');
        return $query->result();
    }
    
    public function getById($id){
        $this->db->where("idQuestion", $id);
        $query = $this->db->get('questions');
        return $query->row();
    }
    
    public function getTodayQuestion(){
        $this->db->select();
        $this->db->where('valid_from <=',date('Y-m-d'));
        $this->db->where('valid_until >=',date('Y-m-d'));
        $query = $this->db->get('questions');
        
        return $query->row();
    }

}