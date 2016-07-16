<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function remarcar_visita($id_visita) {

        $this->db->select('visitas.*, imoveis.logradouro, imoveis.numero, imoveis.cep, bairros.nome as nome_bairro, cidades.nome as nome_cidade');
        $this->db->from('visitas');
        $this->db->join('imoveis', 'visitas.id_imovel       = imoveis.id_imovel');
        $this->db->join('categorias', 'categorias.id_categoria = imoveis.categoria', 'outer left');
        $this->db->join('bairros', 'bairros.id_bairro       = imoveis.id_bairro', 'outer left');
        $this->db->join('cidades', 'cidades.id_cidade       = imoveis.id_cidade', 'outer left');

        $this->db->where('visitas.id_visita', $id_visita);
        $data['visita'] = $this->db->get()->result();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/painel_remarcar_visita', $data);
        $this->load->view('administracao/html_footer');
    }

    public function salvar_alteracao_visita() {

        // Obtem dados do formulario
        $data['id_imovel'] = $this->input->post('id_imovel');
        $data['nome'] = $this->input->post('nome');
        $data['data'] = $this->input->post('nova_data');
        $data['hora'] = $this->input->post('nova_hora');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nova_data', 'Nova data da visita', 'required');
        $this->form_validation->set_rules('nova_hora', 'Novo horário da visita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->remarcar_visita($id_visita);
        } else {
            // Remarca a Visita para nova data e horario
            $id_visita = $this->input->post('id_visita');
            $this->db->where('id_visita', $id_visita);
            $this->db->update('visitas', $data);

            // Busca dados da Visita
            $this->db->where('id_visita', $id_visita);
            $data['visita'] = $this->db->get('visitas')->result();

            $email = $data['visita'][0]->email;

            // Notifica o cliente sobre o reagendamento
            $mensagem = $this->load->view('reagendamento_mensagem', $data, TRUE);

            $this->load->library('email');

            $config["protocol"] = "smtp";
            $config["smtp_host"] = "ssl://smtp.gmail.com";
            $config["smtp_user"] = "fdesiqueira.ti@gmail.com";
            $config["smtp_pass"] = "fe150112";
            $config["charset"] = "utf-8";
            $config["mailtype"] = "html";
            $config["newline"] = "\r\n";
            $config["smtp_port"] = '465';

            $this->email->initialize($config);

            $this->email->set_newline("\r\n");

            $this->email->from('admin@dsw3.com.br', 'Contato Imobiliaria - Reagendamento de Visita');
            $this->email->to($email);
            $this->email->subject('DSW3 Imoveis - Reagendamento de Visita ');
            $this->email->message($mensagem);

            if ($this->email->send()) {
                // Mensagem de sucesso
                $this->session->set_flashdata("sucesso", "Visita remarcada com sucesso.");
            } else {
                // Mensagem de Falha	
                $this->session->set_flashdata("erro", "Visita não pode ser remarcada.");
            }

            // Exibe o Painel de Administracao de Imoveis
            redirect(base_url() . "administracao/home/painel");
        }
    }

}
