<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $dataSession;
    protected $title = "Login";
    protected $action = "/login/";

    public function __construct() {
        parent::__construct();

        if (ENVIRONMENT == 'development') {
           //$this->output->enable_profiler(TRUE);
        }
    }

    public function index() {
        if($this->session->userdata('logged_in')== TRUE){
            redirect('/app/pergunta-do-dia/',"refresh");
        }
        
        $data['title'] = $this->title;
        $data['action'] = $this->action;

        if ($this->input->post()) {
            $email = $this->input->post("email");
            $senha = sha1($this->input->post("senha"));

            $this->load->model("Login_model");
            $resultado = $this->Login_model->verificar($email, $senha);

            if ($resultado) {
                foreach ($resultado as $row) {
                    $this->dataSession = array('id' => $row->idCadastro, 'usuario' => $row->nome_completo, 'email' => $row->email, 'logged_in' => TRUE, 'level' => 'user');
                }
                $this->session->set_userdata($this->dataSession);
                redirect('/app/pergunta-do-dia/', 'refresh');
            } else {
                $this->session->set_flashdata('erro', 'Este e-mail e senha não correspondem');
            }
        }
        $this->load->view('header_view');
        $this->load->view('login_view', $data);
        $this->load->view('footer_view');
    }
    
    public function logout(){
        $userdata = array('id','usuario','email','level','logged_in');
        $this->session->unset_userdata($userdata);
        redirect(base_url(),"refresh");
    }

}
