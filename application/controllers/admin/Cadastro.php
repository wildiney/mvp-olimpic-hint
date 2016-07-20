<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
    
    protected $html;
    
    public function __construct() {
        parent::__construct();
        
        if(ENVIRONMENT=='development'){
            $this->output->enable_profiler(TRUE);
        }
        
        if($this->session->userdata('level')!='admin'){
            redirect('/admin', "refresh");
            exit;
        } 
    }
    
    public function pergunta_do_dia() {
        if($this->input->post()){
            $data['question'] = $this->input->post('question');
            $data['valid_from'] = $this->input->post('valid_from');
            $data['valid_until'] = $this->input->post('valid_until');
            $this->load->model("Questions_model");
            
            if($lastId = $this->Questions_model->save($data)){
                $this->load->model("Answers_model");
                $answers = $this->input->post('answers');
                foreach($answers as $answer){
                    $data = array('answer'=>$answer, 'idQuestion' => $lastId);
                    $this->Answers_model->save($data);
                };
            }
            redirect('/admin/cadastro/listar_perguntas/','refresh');
        }
        $this->load->view('header_view');
        $this->load->view('admin/cadastro_de_perguntas_view');
        $this->load->view('footer_view');
    }
    
    public function listar_perguntas(){
        $this->html = "";
        
        $this->load->model("Questions_model");
        $this->load->model("Answers_model");
        $questions = $this->Questions_model->listAll();
        
        foreach($questions as $question){
            $this->html .= "<table class='table table-bordered'>";
            $this->html .= "<tr><td colspan='2'>" . $question->question ."</td><td>" . $question->valid_from . "</td><td>" . $question->valid_until . "</td></tr>";
            $answers = $this->Answers_model->listById($question->idQuestion);
            $this->html .= "<tr><td colspan='4'>";
            foreach($answers as $answer){
                $this->html .= $answer->answer."<br />";
            }
            $this->html .= "</td></tr>";
            $this->html .= "</table>";
        }
        $data['html'] = $this->html;
        
        $this->load->view('header_view');
        echo $this->html;
        $this->load->view('footer_view');

    }
        
}
