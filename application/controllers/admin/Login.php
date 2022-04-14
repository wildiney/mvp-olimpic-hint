<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    private $dataSession;
    protected $title = "Login Administrativo";
   

    public function __construct() {
        parent::__construct();
        
        if(ENVIRONMENT=='development'){
            $this->output->enable_profiler(TRUE);
        }
    }

    public function index() {
        $data['title'] = $this->title;

        if ($this->input->post()) {
            $email = $this->input->post("email");
            $password = sha1($this->input->post("senha"));

            $this->load->model("Admin_model");
            $result = $this->Admin_model->verificar($email, $password);

            if ($result) {
                foreach ($result as $row) {
                    $this->dataSession = array('id' => $row->idAdmin, 'usuario' => $row->name, 'email' => $row->email, 'logged_in' => TRUE, 'level' => 'admin');
                }
                $this->session->set_userdata($this->dataSession);
                redirect('/admin/cadastro/pergunta-do-dia/', 'refresh');
            } else {
                $this->session->set_flashdata('erro', 'Este e-mail e senha não correspondem');
            }
        }
        $this->load->view('header_view');
        $this->load->view('/admin/login_view', $data);
        $this->load->view('footer_view');
    }
    
    public function logout(){
        $userdata = array('id','usuario','email','level','logged_in');
        $this->session->unset_userdata($userdata);
        redirect(base_url(),"refresh");
    }
}
