<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    protected $user;

    public function __construct() {
        parent::__construct();

        if (ENVIRONMENT == 'development') {
            //$this->output->enable_profiler(TRUE);
        }

        if ($this->session->userdata('logged_in') === FALSE) {
            redirect('/', "refresh");
            exit;
        }
    }

    public function pergunta_do_dia() {
        /**
         * Load Models
         */
        $this->load->model("Votes_model");

        $username = $this->session->userdata("usuario");
        $idUser = $this->session->userdata("id");

        $layout['user'] = $username;

        $this->load->model("Questions_model");
        $this->load->model("Answers_model");

        $question = $this->Questions_model->getTodayQuestion();
        if (!$question) {
            $this->load->view('header_view', $layout);
            $this->load->view('pergunta_do_dia_nao_view');
            $this->load->view('footer_view');
        } else {
            $idQuestion = $question->idQuestion;
            $answers = $this->Answers_model->getAnswers($idQuestion);

            $data['question'] = $question->question;
            $data['answers'] = $answers;

            if ($this->Votes_model->checkUserVote($idUser, $idQuestion)) {
                $this->load->view('header_view', $layout);
                $this->load->view('pergunta_do_dia_view', $data);
                $this->load->view('footer_view');
            } else {
                $this->load->view('header_view', $layout);
                $this->load->view('pergunta_do_dia_respondida_view', $data);
                $this->load->view('footer_view');
            }
        }
    }

    public function resultado() {
        //Get Session User
        $layout['user'] = $this->session->userdata("usuario");
        //Start variables
        $totalVotes = "";

        //Load Models
        $this->load->model("Questions_model");
        $this->load->model("Answers_model");
        $this->load->model("Votes_model");

        //Check if is post
        if ($this->input->post()) {
            $idAnswer = $this->input->post("option");
            $question = $this->Answers_model->getQuestion($idAnswer);
            $idQuestion = $question->idQuestion;

            $data['idCadastro'] = $this->session->userdata('id');
            $data['idQuestion'] = $idQuestion;
            $data['idAnswer'] = $idAnswer;

            $this->Votes_model->vote($data);
            unset($data);
        } else {
            $question = $this->Questions_model->getTodayQuestion();
            if(!$question){
                $this->load->view('header_view', $layout);
                $this->load->view('resultado_nao_view');
                $this->load->view('footer_view');
            } else {
                $idQuestion = $question->idQuestion;
            }
        }

        /**
         * Get question title
         */
        $question = $this->Questions_model->getById($idQuestion);
        $data['question'] = $question->question;

        /**
         * Get answers title and votes
         */
        $answers = $this->Answers_model->getAnswers($idQuestion);
        foreach ($answers as $answer) {
            $idAnswer = $answer->idAnswer;
            $idQuestion = $answer->idQuestion;
            $answer = $answer->answer;
            $getVotes = $this->Votes_model->getVotes($idAnswer);
            $numVotes = (isset($getVotes->subtotal)) ? $getVotes->subtotal : "0";
            $totalVotes += (int) $numVotes;
            $ans[] = array('idAnswer' => $idAnswer, 'idQuestion' => $idQuestion, 'answer' => $answer, 'votes' => $numVotes);
        }

        $data['results'] = $ans;
        $data['totalVotes'] = $totalVotes;

        $this->load->view('header_view', $layout);
        $this->load->view('resultado_view', $data);
        $this->load->view('footer_view');
    }

    public function quadro_de_medalhas() {
        $layout['user'] = $this->session->userdata("usuario");

        $this->load->view('header_view', $layout);
        $this->load->view('quadro_de_medalhas_view');
        $this->load->view('footer_view');
    }

    public function noticias(){
        $layout['user'] = $this->session->userdata("usuario");
        $output="";
        $rss = "https://www.google.com.br/alerts/feeds/03759225661968508847/16216651715528828394";
        $feed = simplexml_load_file($rss);

        foreach($feed->entry as $item){
            $output .= "<div class='noticia'>";
            $output .= "<h3><a target='_blank' href='" . $item->link->attributes()->href . "'>" . $item->title . "</a></h3>";
            $output .= "<p><small>Última atualização: " . substr($item->updated,0,10) . "</small></p>";
            $output .= "<p>" . $item->content . "</p>";
            $output .= "</div>";
            }
       
        $data['feed']= $output;
                
        $this->load->view('header_view',$layout);
        $this->load->view('noticias_view',$data);
        $this->load->view('footer_view');
    }

}
