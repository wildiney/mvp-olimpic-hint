<?php

/**
 * Description of Login_model
 *
 * @author wildiney
 */
class Answers_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        }
    
    public function save($data){
        if ($this->db->insert('answers', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function getQuestion($id){
        $query = $this->db->get_where('answers', array('idAnswer' => $id));
        return $query->row();
    }
    
    public function vote($id){
        $this->db->where('idAnswer', $id);
        $this->db->set('votes', 'votes+1', FALSE);
        $this->db->update('answers');
        
        if ($this->db->affected_rows() == '1') {
            $idQuestion = $this->getQuestion($id);
            return $idQuestion->idQuestion;
        } else {
            return FALSE;
        }
    }
    
    public function votesResults($idQuestion){
        $this->db->select('answers.idAnswer,answers.idQuestion,answers.answer,votes.votes,votes.idVote,votes.idQuestion,votes.idAnswer,votes.idCadastro');
        $this->db->from('answers');
        $this->db->join('votes','votes.idAnswer = answers.idAnswer');
        $this->db->where('idQuestion',$idQuestion);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function listById($id){
        $this->db->select();
        $this->db->from('answers');
        $this->db->where('idQuestion',$id);
        $query = $this->db->get();
        return $query->result();
    }
    
    /*
$ans['idAnswer'][] = $answer->idAnswer;
            $ans['idQuestion'][] = $answer->idQuestion;
            $ans['writtenAnswer'][] = $answer->answer;
            $ans['votes'][] = $this->Votes_model->getVotes($answer->idAnswer);     */
    public function getAnswers($idQuestion){
        $this->db->select();
        $this->db->where('idQuestion',$idQuestion);
        $query = $this->db->get('answers');
        return $query->result();
    }
    
//    public function getAnswers($id){
//        $query = $this->db->get_where('answers', array('idQuestion' => $id));
//        return $query->result();
//    }

}