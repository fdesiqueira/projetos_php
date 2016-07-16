<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
            redirect(base_url() . "administracao/home");
        }
    }

    public function index($pagina = null) {
        $this->load->library('table');
        $this->load->library('pagination');

        $mostrar_por_pagina = 3;
        $this->db->where('ativo', 1);
        $data['usuarios'] = $this->db->get('usuarios', $mostrar_por_pagina, $pagina)->result();

        $this->db->select('count(*) as total');
        $this->db->from('usuarios');
        $numero_itens = $this->db->get()->result();

        $config['base_url'] = base_url("administracao/usuarios");
        $config['total_rows'] = $numero_itens[0]->total;
        $config['per_page'] = $mostrar_por_pagina;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'Primeiro';
        $config['prev_link'] = 'Anterior';
        $config['next_link'] = 'Proximo';
        $config['last_link'] = 'Ultimo';
        $this->pagination->initialize($config);
        $data['paginacao'] = $this->pagination->create_links();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/usuarios', $data);
        $this->load->view('administracao/html_footer');
    }

    public function adicionar() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'Usuário', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('creci', 'CRECI', 'required|is_unique[usuarios.creci]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $data['usuario'] = $this->input->post('usuario');
            $data['senha'] = $this->input->post('senha');
            $data['identidade'] = $this->input->post('identidade');
            $data['cpf'] = $this->input->post('cpf');
            $data['email'] = $this->input->post('email');
            $data['creci'] = $this->input->post('creci');
            $data['telefone'] = $this->input->post('telefone');
            $data['celular'] = $this->input->post('celular');

            $retorno = $this->db->insert('usuarios', $data);
            if ($retorno) {
                $this->session->set_flashdata("sucesso", "Corretor cadastrado com sucesso.");
            } else {
                $this->session->set_flashdata("erro", "Houve um erro ao cadastrar o Corretor.");
            }
            redirect(base_url() . "administracao/usuarios");
        }
    }

    public function editar($id) {
        $this->db->where('id_usuario', $id);
        $data['usuarios'] = $this->db->get('usuarios')->result();
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/editar_usuario', $data);
        $this->load->view('administracao/html_footer');
    }

    public function salvar_alteracao($id) {

        $id = $this->input->post('id_usuario');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('usuario', 'Nome do usuário', 'required');
        $this->form_validation->set_rules('senha', 'Senha do usuário', 'required');
        $this->form_validation->set_rules('creci', 'creci', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->editar($id);
        } else {

            $data['usuario'] = $this->input->post('usuario');
            $data['senha'] = $this->input->post('senha');
            $data['identidade'] = $this->input->post('identidade');
            $data['cpf'] = $this->input->post('cpf');
            $data['email'] = $this->input->post('email');
            $data['creci'] = $this->input->post('creci');
            $data['telefone'] = $this->input->post('telefone');
            $data['celular'] = $this->input->post('celular');

            $this->db->where('id_usuario', $id);
            $retorno = $this->db->update('usuarios', $data);
            if ($retorno) {
                $this->session->set_flashdata("sucesso", "Corretor atualizado com sucesso.");
            } else {
                $this->session->set_flashdata("erro", "Houve um erro ao atualizar o Corretor.");
            }
            redirect(base_url() . "administracao/usuarios");
        }
    }

    function excluir($id) {

        $data['ativo'] = 0;

        $this->db->where('id_usuario', $id);
        $retorno = $this->db->update('usuarios', $data);
        if ($retorno) {
            $this->session->set_flashdata("sucesso", "Corretor excluído com sucesso.");
        } else {
            $this->session->set_flashdata("erro", "Houve um erro ao excluir o Corretor.");
        }
        redirect(base_url() . "administracao/usuarios");
    }

}
