<?php

/**
 * Description of Login_model
 *
 * @author wildiney
 */
class Votes_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        }

    public function vote($data){
        if ($this->db->insert('votes', $data)) {
            return TRUE;
        }
    }
    
    public function votesResults($idQuestion){
        $this->db->select("count(votes.idAnswer) as subtotal,votes.idAnswer,votes.idQuestion,answers.answer");
        $this->db->from('answers');
        $this->db->join('votes','votes.idAnswer = answers.idAnswer');
        $this->db->group_by('idAnswer');
        $this->db->where('votes.idQuestion',$idQuestion);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getVotes($idAnswer){
        $this->db->select("idAnswer, count(votes.idAnswer) as subtotal");
        $this->db->from('votes');
        $this->db->where('idAnswer',$idAnswer);
        $this->db->group_by('idAnswer');
        $query = $this->db->get();
        return $query->row();
    }

    public function checkUserVote($idUser,$idQuestion){
        $this->db->select();
        $this->db->where('idCadastro',$idUser);
        $this->db->where('idQuestion',$idQuestion);
        $query = $this->db->get('votes');
        if($query->num_rows() >0){
            return false;
        } else {
            return true;
        }
    }
    
}