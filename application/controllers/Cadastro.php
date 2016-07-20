<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
    public function index() {
        if($this->input->post()){
            $data['matricula'] = $this->input->post('matricula');
            $data['nome_completo'] = $this->input->post('nome_completo');
            $data['data_nascimento'] = $this->input->post('data_nascimento');
            $data['email'] = $this->input->post('email');
            $data['telefone'] = $this->input->post('telefone');
            $data['cidade'] = $this->input->post('cidade');
            $data['estado'] = $this->input->post('estado');
            $data['projeto_area'] = $this->input->post('projeto_area');
            $data['senha'] = $this->input->post('senha');
            
            $this->load->model("Cadastro_model");
            $resultado = $this->Cadastro_model->gravar($data);
            
            if($resultado){
                redirect('/login','refresh');
            } else {
                $this->session->set_flashdata('erro', 'Usuário já cadastrado');
            }
            
        }
            $this->load->view('header_view');
            $this->load->view('cadastro_view');
            $this->load->view('footer_view');
    }

}
